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
interface SubscriptionInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get isRead
     *
     * @return boolean
     */
    public function isRead();

    /**
     * Set isRead
     *
     * @param  boolean      $isRead
     * @return Subscription
     */
    public function setRead($isRead);

    /**
     * Get isSubscribed
     *
     * @return boolean
     */
    public function isSubscribed();

    /**
     * Set isSubscribed
     *
     * @param  boolean      $isSubscribed
     * @return Subscription
     */
    public function setSubscribed($isSubscribed);

    /**
     * Get topic
     *
     * @return Forum
     */
    public function getForum();

    /**
     * Set topic
     *
     * @param  Forum        $forum
     * @return Subscription
     */
    public function setForum(ForumInterface $forum = null);

    /**
     * Get topic
     *
     * @return Topic
     */
    public function getTopic();

    /**
     * Set topic
     *
     * @param  Topic        $topic
     * @return Subscription
     */
    public function setTopic(TopicInterface $topic = null);

    /**
     * Get owned_by
     *
     * @return UserInterface
     */
    public function getOwnedBy();

    /**
     * Set owned_by
     *
     * @param  UserInterface $ownedBy
     * @return Subscription
     */
    public function setOwnedBy(UserInterface $ownedBy = null);
}
