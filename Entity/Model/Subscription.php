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

use CCDNForum\ForumBundle\Entity\ForumInterface;
use CCDNForum\ForumBundle\Entity\SubscriptionInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class Subscription implements SubscriptionInterface
{
    /** @var Topic $topic */
    protected $forum = null;

    /** @var Topic $topic */
    protected $topic = null;

    /** @var UserInterface $ownedBy */
    protected $ownedBy = null;

    /**
     *
     * @access public
     */
    public function __construct()
    {
        // your own logic
    }

    /**
     * Get topic
     *
     * @return ForumInterface
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * Set topic
     *
     * @param  ForumInterface        $forum
     * @return SubscriptionInterface
     */
    public function setForum(ForumInterface $forum = null)
    {
        $this->forum = $forum;

        return $this;
    }

    /**
     * Get topic
     *
     * @return TopicInterface
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set topic
     *
     * @param  TopicInterface        $topic
     * @return SubscriptionInterface
     */
    public function setTopic(TopicInterface $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get owned_by
     *
     * @return UserInterface
     */
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }

    /**
     * Set owned_by
     *
     * @param  UserInterface $ownedBy
     * @return SubscriptionInterface
     */
    public function setOwnedBy(UserInterface $ownedBy = null)
    {
        $this->ownedBy = $ownedBy;

        return $this;
    }
}
