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

use CCDNForum\ForumBundle\Entity\PostInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class Post implements PostInterface
{
    /** @var Topic $topic */
    protected $topic = null;

    /** @var UserInterface $createdBy */
    protected $createdBy;

    /** @var UserInterface $editedBy */
    protected $editedBy = null;

    /** @var UserInterface $deletedBy */
    protected $deletedBy = null;

    /** @var Attachment $attachment */
    protected $attachment = null;

    /** @var UserInterface $unlockedBy */
    protected $unlockedBy = null;

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
     * @return TopicInterface
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set topic
     *
     * @param  TopicInterface $topic
     * @return PostInterface
     */
    public function setTopic(TopicInterface $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get created_by
     *
     * @return UserInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set created_by
     *
     * @param  UserInterface $createdBy
     * @return PostInterface
     */
    public function setCreatedBy(UserInterface $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get edited_by
     *
     * @return UserInterface
     */
    public function getEditedBy()
    {
        return $this->editedBy;
    }

    /**
     * Set edited_by
     *
     * @param  UserInterface $editedBy
     * @return PostInterface
     */
    public function setEditedBy(UserInterface $editedBy = null)
    {
        $this->editedBy = $editedBy;

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
     * @return PostInterface
     */
    public function setDeletedBy(UserInterface $deletedBy = null)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Get unlocked_by
     *
     * @return UserInterface
     */
    public function getUnlockedBy()
    {
        return $this->unlockedBy;
    }

    /**
     * Set unlocked_by
     *
     * @param  UserInterface $unlockedBy
     * @return PostInterface
     */
    public function setUnlockedBy(UserInterface $unlockedBy = null)
    {
        $this->unlockedBy = $unlockedBy;

        return $this;
    }
}
