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
interface PostInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get body
     *
     * @return string
     */
    public function getBody();

    /**
     * Set body
     *
     * @param  string $body
     * @return Post
     */
    public function setBody($body);

    /**
     * Get createdDate
     *
     * @return \datetime
     */
    public function getCreatedDate();

    /**
     * Set createdDate
     *
     * @param  \datetime $createdDate
     * @return Post
     */
    public function setCreatedDate($createdDate);

    /**
     * Get edited_date
     *
     * @return \datetime
     */
    public function getEditedDate();

    /**
     * Set editedDate
     *
     * @param  \datetime $editedDate
     * @return Post
     */
    public function setEditedDate($editedDate);

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function isDeleted();

    /**
     * Set is_deleted
     *
     * @param  boolean $isDeleted
     * @return Post
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
     * @return Post
     */
    public function setDeletedDate($deletedDate);

    /**
     * Get unlockedDate
     *
     * @return \datetime
     */
    public function getUnlockedDate();

    /**
     * Set unlockedDate
     *
     * @param  \datetime $datetime
     * @return Post
     */
    public function setUnlockedDate(\Datetime $datetime);

    /**
     * Get unlockedUntilDate
     *
     * @return \datetime
     */
    public function getUnlockedUntilDate();

    /**
     * Set unlockedUntilDate
     *
     * @param  \datetime $datetime
     * @return Post
     */
    public function setUnlockedUntilDate(\Datetime $datetime);

    /**
     * Get isUnlocked
     *
     * @return \datetime
     */
    public function isLocked();

    /**
     * Get topic
     *
     * @return Topic
     */
    public function getTopic();

    /**
     * Set topic
     *
     * @param  Topic $topic
     * @return Post
     */
    public function setTopic(TopicInterface $topic = null);

    /**
     * Get created_by
     *
     * @return UserInterface
     */
    public function getCreatedBy();

    /**
     * Set created_by
     *
     * @param  UserInterface $createdBy
     * @return Post
     */
    public function setCreatedBy(UserInterface $createdBy = null);

    /**
     * Get edited_by
     *
     * @return UserInterface
     */
    public function getEditedBy();

    /**
     * Set edited_by
     *
     * @param  UserInterface $editedBy
     * @return Post
     */
    public function setEditedBy(UserInterface $editedBy = null);

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
     * @return Post
     */
    public function setDeletedBy(UserInterface $deletedBy = null);

    /**
     * Get unlocked_by
     *
     * @return UserInterface
     */
    public function getUnlockedBy();

    /**
     * Set unlocked_by
     *
     * @param  UserInterface $unlockedBy
     * @return Post
     */
    public function setUnlockedBy(UserInterface $unlockedBy = null);
}
