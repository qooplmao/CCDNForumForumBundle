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
use CCDNForum\ForumBundle\Entity\CategoryInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;
use CCDNForum\ForumBundle\Entity\PostInterface;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Board implements BoardInterface
{
    /** @var Category $category */
    protected $category = null;

    /** @var ArrayCollection $topic */
    protected $topics;

    /** @var Post $lastPost */
    protected $lastPost;

    /**
     *
     * @access public
     */
    public function __construct()
    {
        // your own logic
        $this->topics = new ArrayCollection();
    }

    /**
     * Get category
     *
     * @return CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param  CategoryInterface $category
     * @return BoardInterface
     */
    public function setCategory(CategoryInterface $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get topics
     *
     * @return ArrayCollection
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * Set topics
     *
     * @param  ArrayCollection $topics
     * @return BoardInterface
     */
    public function setTopics(ArrayCollection $topics = null)
    {
        $this->topics = $topics;

        return $this;
    }

    /**
     * Add topic
     *
     * @param  TopicInterface $topic
     * @return BoardInterface
     */
    public function addTopic(TopicInterface $topic)
    {
        $this->topics->add($topic);

        return $this;
    }

    /**
     * @param TopicInterface $topic
     *
     * @return $this
     */
    public function removeTopic(TopicInterface $topic)
    {
        $this->topics->removeElement($topic);

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
     * @return BoardInterface
     */
    public function setLastPost($lastPost = null)
    {
        $this->lastPost = $lastPost;

        return $this;
    }
}
