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
interface CategoryInterface
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
     * @param  string   $name
     * @return Category
     */
    public function setName($name);

    /**
     * Get list_order_priority
     *
     * @return integer
     */
    public function getListOrderPriority();

    /**
     * Set list_order_priority
     *
     * @param  integer  $listOrderPriority
     * @return Category
     */
    public function setListOrderPriority($listOrderPriority);

    /**
     *
     * @return array
     */
    public function getReadAuthorisedRoles();

    /**
     *
     * @param  array $roles
     * @return Board
     */
    public function setReadAuthorisedRoles(array $roles = null);

    /**
     *
     * @param $role
     * @return bool
     */
    public function hasReadAuthorisedRole($role);

    /**
     *
     * @param  SecurityContextInterface $securityContext
     * @return bool
     */
    public function isAuthorisedToRead(SecurityContextInterface $securityContext);

    /**
     *
     * Get Forum
     *
     * @return Forum
     */
    public function getForum();

    /**
     *
     * Set Forum
     *
     * @param  Forum    $forum
     * @return Category
     */
    public function setForum(ForumInterface $forum = null);

    /**
     * Get boards
     *
     * @return ArrayCollection
     */
    public function getBoards();

    /**
     *
     * Set boards
     *
     * @param  ArrayCollection $boards
     * @return Category
     */
    public function setBoards(ArrayCollection $boards = null);

    /**
     *
     * Add board
     *
     * @param  BoardInterface    $board
     * @return Category
     */
    public function addBoard(BoardInterface $board);

    /**
     *
     * Remove Board
     *
     * @param  BoardInterface    $board
     * @return Category
     */
    public function removeBoard(BoardInterface $board);
}
