<?php

/*
 * This file is part of the CCDN ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\Manager;

use CCDNComponent\CommonBundle\Manager\ManagerInterface;
use CCDNComponent\CommonBundle\Manager\BaseManager;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class PostManager extends BaseManager implements ManagerInterface
{
	
	
	/**
	 *
	 * @access protected
	 */
	protected $replyCount;

	
	
	/**
	 *
	 * @access protected
	 */
	protected $postCount;
	
	
	
	/**
	 *
	 * @access public
	 */
	public function flushNow()
	{
		parent::flushNow();
		
		$user = $this->container->get('security.context')->getToken()->getUser();

		$this->container->get('ccdn_forum_forum.registry.manager')->updateCachePostCountForUser($user);
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param $post
	 * @return $this
	 */
	public function insert($post)
	{
		// insert a new row
		$this->persist($post)->flushNow();

		// refresh the user so that we have an PostId to work with.
		$this->refresh($post);
		
		// get the topic
		$topic = $post->getTopic();
		
		// we need to return this to the controller so it
		//  can redirect the user to the appropriate page.
		$topic_counter = $this->container->get('ccdn_forum_forum.board.repository')->getReplyCountsForTopic($topic->getId());
		$this->replyCount = ($topic_counter['replyCount'] - 1);
			
		// set the board / topic last post 
		$topic->setLastPost($post);
		$topic->setReplyCount($this->replyCount);
				
		$this->persist($topic)->flushNow();

		$this->refresh($topic);

		if ($topic->getBoard())
		{
			$this->container->get('ccdn_forum_forum.board.manager')->updateBoardStats($topic->getBoard())->flushNow();			
		}
		
		return $this;
	}	
	
	
	
	/**
	 *
	 * @access public
	 * @param $post
	 * @return $this
	 */
	public function update($post)
	{
		// update a record
		$this->persist($post);
		
		return $this;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param $post, $user
	 * @return $this
	 */
	public function softDelete($post, $user)
	{
		$post->setDeletedBy($user);
		$post->setDeletedDate(new \DateTime());
		
		$topic = $post->getTopic();
		
		// if this is the first post and only post, then
		// soft delete the topic aswell.
		if ($topic->getReplyCount() == 0)
		{
			$topic->setDeletedBy($user);
			$topic->setDeletedDate(new \DateTime());
			$topic->setClosedBy($user);
			$topic->setClosedDate(new \DateTime());
	
			// we must persist and flush before we can get accurate counter information.
			$this->persist($topic, $post)->flushNow();

			if ($topic->getBoard())
			{
				$this->container->get('ccdn_forum_forum.board.manager')->updateBoardStats($topic->getBoard())->flushNow();			
			}
		}
		
		// update the record
		$this->persist($post);
	
		return $this;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param $post
	 * @return $this
	 */
	public function restore($post)
	{
		$post->setDeletedBy(null);
		$post->setDeletedDate(null);
		
		$this->persist($post);
		
		return $this;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param $post, $user
	 * @return $this
	 */
	public function lock($post, $user)
	{		
		$post->setLockedBy($user);
		$post->setLockedDate(new \DateTime());
		
		$this->persist($post);
		
		return $this;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param $post
	 * @return $this
	 */
	public function unlock($post)
	{
		$post->setLockedBy(null);
		$post->setLockedDate(null);
				
		$this->persist($post);
		
		return $this;
	}
	
	public function bulkLock($posts)
	{
		foreach($posts as $post)
		{
			$post->setLockedBy($this->container->get('security.context')->getToken()->getUser());
			$post->setLockedDate(new \DateTime());
						
			$this->persist($post);
		}
		
		return $this;
	}
	
	
	
	public function bulkUnlock($posts)
	{
		foreach($posts as $post)
		{
			$post->setLockedBy(null);
			$post->setLockedDate(null);
						
			$this->persist($post);
		}
		
		return $this;
	}
	
	
	public function bulkRestore($posts)
	{
		foreach($posts as $post)
		{
			$post->setDeletedBy(null);
			$post->setDeletedDate(null);
			
			$this->persist($post);
		}
		
		return $this;
	}
	
	
	public function bulkSoftDelete($posts)
	{
		
		$boardsToUpdate = array();
		
		foreach($posts as $post)
		{
			$post->setDeletedBy($this->container->get('security.context')->getToken()->getUser());
			$post->setDeletedDate(new \DateTime());
			
			$this->persist($post);
			
			if ($post->getTopic())
			{
				$topic = $post->getTopic();
				
				if ($topic->getBoard())
				{
					if ( ! array_key_exists($topic->getBoard()->getId(), $boardsToUpdate))
					{
						$boardsToUpdate[$topic->getBoard()->getId()] = $topic->getBoard();
					}
				}
			}
		}
		
		$this->flushNow();
		
		$boardManager = $this->container->get('ccdn_forum_forum.board.manager');
		
		foreach($boardsToUpdate as $board)
		{
			$boardManager->updateBoardStats($board);
		}
				
		$boardManager->flushNow();
				
		return $this;
	}
	
	
	public function bulkHardDelete($posts)
	{
		
		$postsToDelete = array();
		$topicsToDelete = array();
		$boardsToUpdate = array();
		
		foreach($posts as $post)
		{
			$topic = $post->getTopic();

			if ($post->getTopic())
			{
				$topic = $post->getTopic();

				if ($topic->getFirstPost())
				{
					if ($topic->getFirstPost()->getId() == $post->getId())
					{
						$topic->setFirstPost(null);
						$this->persist($topic);
						
						$this->flushNow();
						
						if ( ! array_key_exists($topic->getId(), $topicsToDelete))
						{
							$topicsToDelete[$topic->getId()] = $topic;
						}
					}
				}

				if ($topic->getBoard())
				{
					$board = $topic->getBoard();

					if ($board->getLastPost())
					{
						if ($board->getLastPost()->getId() == $post->getId())
						{
							$board->setLastPost(null);		
							$this->persist($board);
						}
					}
				}
				
				if ($topic->getLastPost())
				{
					// we need to unlink a topics last post
					// to avoid an integrity constraint.
					if ($topic->getLastPost()->getId() == $post->getId())
					{
						$topic->setLastPost(null);
						$this->persist($topic);
					}
				}

				// if we remove the last post we need to update board stats.
				if ($topic->getBoard())
				{
					if ( ! array_key_exists($topic->getBoard()->getId(), $boardsToUpdate))
					{
						$boardsToUpdate[$topic->getBoard()->getId()] = $topic->getBoard();
					}
				}
			}
			
			if ( ! array_key_exists($post->getId(), $postsToDelete))
			{
				$postsToDelete[$post->getId()] = $post;
			}
		}
	//die();	
		$this->flushNow();

		foreach($postsToDelete as $post)
		{
			$this->remove($post);
		}

		$this->flushNow();
		
		foreach($topicsToDelete as $topic)
		{
			$this->update($topic);
			
			if ($topic)
			{
				$this->remove($topic);
			}
		}
		
		$this->flushNow();
		
		$boardManager = $this->container->get('ccdn_forum_forum.board.manager');
		
		foreach($boardsToUpdate as $board)
		{
			$boardManager->updateBoardStats($board);
		}
				
		$boardManager->flushNow();
				
		return $this;
	}
	
	/**
	 *
	 * @access public
	 * @return Array()
	 */
	public function getCounters()
	{
		return array(
			'replyCount' => $this->replyCount,
			'postCount' => $this->postCount);
	}
	
}