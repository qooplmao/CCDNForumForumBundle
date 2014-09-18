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
use CCDNForum\ForumBundle\Entity\ForumInterface;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Category implements CategoryInterface
{
    /** @var Forum $forum */
    protected $forum;

    /** @var ArrayCollection $boards */
    protected $boards;

    /**
     *
     * @access public
     */
    public function __construct()
    {
        // your own logic
        $this->boards = new ArrayCollection();
    }

    /**
     *
     * Get Forum
     *
     * @return ForumInterface
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     *
     * Set Forum
     *
     * @param  ForumInterface    $forum
     * @return CategoryInterface
     */
    public function setForum(ForumInterface $forum = null)
    {
        if ($this->forum) {
            if ($forum) {
                if ($this->forum->getId() != $forum->getId()) {
                    $this->setListOrderPriority(count($forum->getCategories()) + 1);
                }
            } else {
                $this->setListOrderPriority(0);
            }
        } else {
            if ($forum) {
                $this->setListOrderPriority(count($forum->getCategories()) + 1);
            } else {
                $this->setListOrderPriority(0);
            }
        }

        $this->forum = $forum;

        return $this;
    }

    /**
     * Get boards
     *
     * @return ArrayCollection
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     *
     * Set boards
     *
     * @param  ArrayCollection $boards
     * @return CategoryInterface
     */
    public function setBoards(ArrayCollection $boards = null)
    {
        $this->boards = $boards;

        return $this;
    }

    /**
     *
     * Add board
     *
     * @param  BoardInterface    $board
     * @return CategoryInterface
     */
    public function addBoard(BoardInterface $board)
    {
        $this->boards->add($board);

        return $this;
    }

    /**
     *
     * Remove Board
     *
     * @param  BoardInterface    $board
     * @return CategoryInterface
     */
    public function removeBoard(BoardInterface $board)
    {
        $this->boards->removeElement($board);

        return $this;
    }
}
