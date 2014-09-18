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

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\Common\Collections\ArrayCollection;

use CCDNForum\ForumBundle\Entity\Board as ConcreteBoard;
use CCDNForum\ForumBundle\Entity\Post as ConcretePost;
use CCDNForum\ForumBundle\Entity\Subscription as ConcreteSubscription;

use CCDNForum\ForumBundle\Entity\Model\Topic as AbstractTopic;

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
interface TopicInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param  string $title
     * @return Topic
     */
    public function setTitle($title);

    /**
     * Get cachedViewCount
     *
     * @return integer
     */
    public function getCachedViewCount();

    /**
     * Set cachedViewCount
     *
     * @param  integer $cachedViewCount
     * @return Topic
     */
    public function setCachedViewCount($cachedViewCount);

    /**
     * Get cachedReplyCount
     *
     * @return integer
     */
    public function getCachedReplyCount();

    /**
     * Set cachedReplyCount
     *
     * @param  integer $cachedReplyCount
     * @return Topic
     */
    public function setCachedReplyCount($cachedReplyCount);

    /**
     * Get isClosed
     *
     * @return boolean
     */
    public function isClosed();

    /**
     * Set isClosed
     *
     * @param  boolean $isClosed
     * @return Topic
     */
    public function setClosed($isClosed);

    /**
     * Get closedDate
     *
     * @return \datetime
     */
    public function getClosedDate();

    /**
     * Set closedDate
     *
     * @param  \datetime $closedDate
     * @return Topic
     */
    public function setClosedDate($closedDate);

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function isDeleted();

    /**
     * Set isDeleted
     *
     * @param  boolean $isDeleted
     * @return Topic
     */
    public function setDeleted($isDeleted);

    /**
     * Get deletedDate
     *
     * @return \datetime
     */
    public function getDeletedDate();

    /**
     * Set deletedDate
     *
     * @param  \datetime $deletedDate
     * @return Topic
     */
    public function setDeletedDate($deletedDate);

    /**
     * Get isSticky
     *
     * @return boolean
     */
    public function isSticky();

    /**
     * Set isSticky
     *
     * @param  boolean $isSticky
     * @return Topic
     */
    public function setSticky($isSticky);

    /**
     * Get stickiedDate
     *
     * @return \datetime
     */
    public function getStickiedDate();

    /**
     * Set stickiedDate
     *
     * @param  \datetime $stickiedDate
     * @return Topic
     */
    public function setStickiedDate($stickiedDate);

    /**
     * Get board
     *
     * @return Board
     */
    public function getBoard();

    /**
     * Set board
     *
     * @param  Board $board
     * @return Topic
     */
    public function setBoard(BoardInterface $board = null);

    /**
     * Get closed_by
     *
     * @return UserInterface
     */
    public function getClosedBy();

    /**
     * Set closed_by
     *
     * @param  UserInterface $closedBy
     * @return Topic
     */
    public function setClosedBy(UserInterface $closedBy = null);

    /**
     * Get deleted_by
     *
     * @return UserInterface
     */
    public function getDeletedBy();

    /**
     * Set deleted_by
     *
     * @param  UserInterface $deletedBy
     * @return Topic
     */
    public function setDeletedBy(UserInterface $deletedBy = null);

    /**
     * Get stickiedBy
     *
     * @return UserInterface
     */
    public function getStickiedBy();

    /**
     * Set stickiedBy
     *
     * @param  UserInterface $stickiedBy
     * @return Topic
     */
    public function setStickiedBy(UserInterface $stickiedBy = null);

    /**
     * Get first_post
     *
     * @return Post
     */
    public function getFirstPost();

    /**
     * Set first_post
     *
     * @param  Post  $firstPost
     * @return Topic
     */
    public function setFirstPost(PostInterface $firstPost = null);

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
     * @return Topic
     */
    public function setLastPost(PostInterface $lastPost = null);

    /**
     *
     * Get posts
     *
     * @return ArrayCollection
     */
    public function getPosts();

    /**
     *
     * Set posts
     *
     * @param  ArrayCollection $posts
     * @return Topic
     */
    public function setPosts(ArrayCollection $posts = null);

    /**
     *
     * Add post
     *
     * @param  Post  $post
     * @return Topic
     */
    public function addPost(PostInterface $post);

    /**
     *
     * @param  Post  $post
     * @return Topic
     */
    public function removePost(PostInterface $post);

    /**
     *
     * Get subscriptions
     *
     * @return ArrayCollection
     */
    public function getSubscriptions();

    /**
     *
     * @param  ArrayCollection $subscriptions
     * @return Topic
     */
    public function setSubscriptions(ArrayCollection $subscriptions = null);

    /**
     * Add subscription
     *
     * @param  Subscription $subscription
     * @return Topic
     */
    public function addSubscription(SubscriptionInterface $subscription);

    /**
     *
     * @param Subscription $subscription
     * @return $this
     */
    public function removeSubscription(SubscriptionInterface $subscription);
}
