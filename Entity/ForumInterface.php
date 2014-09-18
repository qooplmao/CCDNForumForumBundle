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
interface ForumInterface
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
     * @return Forum
     */
    public function setName($name);

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
     * Get categories
     *
     * @return Categories
     */
    public function getCategories();

    /**
     *
     * Set categories
     *
     * @return Forum
     */
    public function setCategories(ArrayCollection $categories = null);

    /**
     *
     * Add category
     *
     * @param  Category $category
     * @return Forum
     */
    public function addCategory(CategoryInterface $category);

    /**
     *
     * Remove Category
     *
     * @param  Category $category
     * @return Forum
     */
    public function removeCategory(CategoryInterface $category);
}
