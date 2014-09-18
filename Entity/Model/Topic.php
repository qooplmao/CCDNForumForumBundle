<?php

/*
 * This file is part of the CCDNForum ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\Entity\Model;

use CCDNForum\ForumBundle\Entity\BoardInterface;
use CCDNForum\ForumBundle\Entity\PostInterface;
use CCDNForum\ForumBundle\Entity\SubscriptionInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;
use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\Common\Collections\ArrayCollection;

abstract class Topic implements TopicInterface
{
    /** @var Board $board */
    protected $board = null;

    /** @var UserInterface $closedBy */
    protected $closedBy = null;

    /** @var UserInterface $deletedBy */
    protected $deletedBy = null;

    /** @var UserInterface $stickiedBy */
    protected $stickiedBy = null;

    /** @var Post $firstPost */
    protected $firstPost = null;

    /** @var Post $lastPost */
    protected $lastPost = null;

    /** @var ArrayCollection $posts */
    protected $posts;

    /** @var ArrayCollection $subscriptions */
    protected $subscriptions;

    /**
     *
     * @access public
     */
    public function __construct()
    {
        // your own logic
        $this->posts = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
    }

    /**
     * Get board
     *
     * @return BoardInterface
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set board
     *
     * @param  BoardInterface $board
     * @return TopicInterface
     */
    public function setBoard(BoardInterface $board = null)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get closed_by
     *
     * @return UserInterface
     */
    public function getClosedBy()
    {
        return $this->closedBy;
    }

    /**
     * Set closed_by
     *
     * @param  UserInterface $closedBy
     * @return TopicInterface
     */
    public function setClosedBy(UserInterface $closedBy = null)
    {
        $this->closedBy = $closedBy;

        return $this;
    }

    /**
     * Get deleted_by
     *
     * @return UserInterface
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    /**
     * Set deleted_by
     *
     * @param  UserInterface $deletedBy
     * @return TopicInterface
     */
    public function setDeletedBy(UserInterface $deletedBy = null)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Get stickiedBy
     *
     * @return UserInterface
     */
    public function getStickiedBy()
    {
        return $this->stickiedBy;
    }

    /**
     * Set stickiedBy
     *
     * @param  UserInterface $stickiedBy
     * @return TopicInterface
     */
    public function setStickiedBy(UserInterface $stickiedBy = null)
    {
        $this->stickiedBy = $stickiedBy;

        return $this;
    }

    /**
     * Get first_post
     *
     * @return PostInterface
     */
    public function getFirstPost()
    {
        return $this->firstPost;
    }

    /**
     * Set first_post
     *
     * @param  PostInterface  $firstPost
     * @return TopicInterface
     */
    public function setFirstPost(PostInterface $firstPost = null)
    {
        $this->firstPost = $firstPost;

        return $this;
    }

    /**
     * Get last_post
     *
     * @return PostInterface
     */
    public function getLastPost()
    {
        return $this->lastPost;
    }

    /**
     * Set last_post
     *
     * @param  PostInterface  $lastPost
     * @return TopicInterface
     */
    public function setLastPost(PostInterface $lastPost = null)
    {
        $this->lastPost = $lastPost;

        return $this;
    }

    /**
     *
     * Get posts
     *
     * @return ArrayCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     *
     * Set posts
     *
     * @param  ArrayCollection $posts
     * @return TopicInterface
     */
    public function setPosts(ArrayCollection $posts = null)
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     *
     * Add post
     *
     * @param  PostInterface  $post
     * @return TopicInterface
     */
    public function addPost(PostInterface $post)
    {
        $this->posts->add($post);

        return $this;
    }

    /**
     *
     * @param  PostInterface  $post
     * @return TopicInterface
     */
    public function removePost(PostInterface $post)
    {
        $this->posts->removeElement($post);

        return $this;
    }

    /**
     *
     * Get subscriptions
     *
     * @return ArrayCollection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     *
     * @param  ArrayCollection $subscriptions
     * @return TopicInterface
     */
    public function setSubscriptions(ArrayCollection $subscriptions = null)
    {
        $this->subscriptions = $subscriptions;

        return $this;
    }

    /**
     * Add subscription
     *
     * @param  SubscriptionInterface $subscription
     * @return TopicInterface
     */
    public function addSubscription(SubscriptionInterface $subscription)
    {
        $this->subscriptions->add($subscription);

        return $this;
    }

    /**
     *
     * @param SubscriptionInterface $subscription
     * @return $this
     */
    public function removeSubscription(SubscriptionInterface $subscription)
    {
        $this->subscriptions->removeElement($subscription);

        return $this;
    }
}
