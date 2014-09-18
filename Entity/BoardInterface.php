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

namespace CCDNForum\ForumBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 *
 * @category CCDNForum
 * @package  ForumBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNForumForumBundle
 *
 */
interface BoardInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param  string $name
     * @return Board
     */
    public function setName($name);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set description
     *
     * @param  string $description
     * @return Board
     */
    public function setDescription($description);

    /**
     * Get list_order_priority
     *
     * @return integer
     */
    public function getListOrderPriority();

    /**
     * Set list_order_priority
     *
     * @param  integer $listOrderPriority
     * @return Board
     */
    public function setListOrderPriority($listOrderPriority);

    /**
     * Get cachedTopicCount
     *
     * @return integer
     */
    public function getCachedTopicCount();

    /**
     * Set cachedTopicCount
     *
     * @param  integer $cachedTopicCount
     * @return Board
     */
    public function setCachedTopicCount($cachedTopicCount);

    /**
     * Get cachedPostCount
     *
     * @return integer
     */
    public function getCachedPostCount();

    /**
     * Set cachedPostCount
     *
     * @param  integer $cachedPostCount
     * @return Board
     */
    public function setCachedPostCount($cachedPostCount);

    /**
     * @return array
     */
    public function getReadAuthorisedRoles();

    /**
     * @param  array $roles
     * @return Board
     */
    public function setReadAuthorisedRoles(array $roles = null);

    /**
     * @param $role
     *
     * @return bool
     */
    public function hasReadAuthorisedRole($role);

    /**
     * @param SecurityContextInterface $securityContext
     *
     * @return bool
     */
    public function isAuthorisedToRead(SecurityContextInterface $securityContext);

    /**
     * @return array
     */
    public function getTopicCreateAuthorisedRoles();

    /**
     * @param array $roles
     *
     * @return Board
     */
    public function setTopicCreateAuthorisedRoles(array $roles = null);

    /**
     * @param $role
     *
     * @return bool
     */
    public function hasTopicCreateAuthorisedRole($role);

    /**
     * @param SecurityContextInterface $securityContext
     *
     * @return bool
     */
    public function isAuthorisedToCreateTopic(SecurityContextInterface $securityContext);

    /**
     * @return array
     */
    public function getTopicReplyAuthorisedRoles();

    /**
     * @param array $roles
     *
     * @return Board
     */
    public function setTopicReplyAuthorisedRoles(array $roles = null);

    /**
     * @param $role
     *
     * @return bool
     */
    public function hasTopicReplyAuthorisedRole($role);

    /**
     * @param SecurityContextInterface $securityContext
     *
     * @return bool
     */
    public function isAuthorisedToReplyToTopic(SecurityContextInterface $securityContext);

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory();

    /**
     * Set category
     *
     * @param  CategoryInterface $category
     * @return Board
     */
    public function setCategory(CategoryInterface $category = null);

    /**
     * Get topics
     *
     * @return ArrayCollection
     */
    public function getTopics();

    /**
     * Set topics
     *
     * @param  ArrayCollection $topics
     * @return Board
     */
    public function setTopics(ArrayCollection $topics = null);

    /**
     * Add topic
     *
     * @param  Topic $topic
     * @return Board
     */
    public function addTopic(TopicInterface $topic);

    /**
     * @param Topic $topic
     *
     * @return $this
     */
    public function removeTopic(TopicInterface $topic);

    /**
     * Get last_post
     *
     * @return Post
     */
    public function getLastPost();

    /**
     * Set last_post
     *
     * @param  Post  $lastPost
     * @return Board
     */
    public function setLastPost($lastPost = null);
}
