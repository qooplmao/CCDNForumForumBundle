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

namespace CCDNForum\ForumBundle\Manager;

use CCDNComponent\CommonBundle\Manager\ManagerInterface;
use CCDNComponent\CommonBundle\Manager\BaseManager;

use CCDNForum\ForumBundle\Entity\Registry;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class RegistryManager extends BaseManager implements ManagerInterface
{



	/**
	 *
	 * @access public
	 * @param $user
	 */
	public function updateCachePostCountForUser($user)
	{

		$record = $this->container->get('ccdn_forum_forum.registry.repository')->findRegistryRecordForUser($user->getId());
		
		if ( ! $record)
		{
			$record = new Registry();
			$record->setOwnedBy($user);
		}
		
		$postCount = $this->container->get('ccdn_forum_forum.post.repository')->getPostCountForUserById($user->getId());
		
		if ( ! $postCount)
		{
			$record->setCachePostCount(0);
			$record->setCacheKarmaPositiveCount(0);
			$record->setCacheKarmaNegativeCount(0);
		} else {
			$record->setCachePostCount($postCount['postCount']);		
		}
		
		$this->persist($record)->flushNow();
	}
	


	/**
	 *
	 * @access public
	 * @param $user
	 */
	public function updateCacheKarmaCountForUser($user)
	{

		$record = $this->container->get('ccdn_forum_forum.registry.repository')->findRegistryRecordForUser($user->getId());
		
		if ( ! $record)
		{
			$record = new Registry();
			$record->setOwnedBy($user);
		}
		
		$karmaCount = $this->container->get('ccdn_forum_karma.karma.repository')->getKarmaCountForUserById($user->getId());
		
		$record->setCacheKarmaPositiveCount($karmaCount['karmaPositiveCount']);
		$record->setCacheKarmaNegativeCount($karmaCount['karmaNegativeCount']);
		
		
		$this->persist($record)->flushNow();
	}
	
	
	
	/**
	 *
	 *
	 */
	public function getRegistriesForUsersAsArray($registryUserIds = array())
	{
	
		$registriesTemp = $this->container->get('ccdn_forum_forum.registry.repository')->getPostCountsForUsers($registryUserIds);
	
		//
		// Sort the registries so that the [id] is the key of the parent key.
		//
		$registries = array();
	
		foreach ($registriesTemp as $key => $registry)
		{
			$registries[$registry->getOwnedBy()->getId()] = $registry;
		}
		
		if (! @isset($registries))
		{
			$registries = array();
		} else {
			if (count($registries) < 1)
			{
				$registries = array();
			}
		}
		
		return $registries;
	}
	
}