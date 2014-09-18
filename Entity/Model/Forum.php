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

use CCDNForum\ForumBundle\Entity\CategoryInterface;
use CCDNForum\ForumBundle\Entity\ForumInterface;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Forum implements ForumInterface
{
    /** @var $categories */
    protected $categories = null;

    /**
     *
     * @access public
     */
    public function __construct()
    {
        // your own logic
        $this->categories = new ArrayCollection();
    }

    /**
     *
     * Get categories
     *
     * @return Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     *
     * Set categories
     *
     * @return ForumInterface
     */
    public function setCategories(ArrayCollection $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     *
     * Add category
     *
     * @param  CategoryInterface $category
     * @return ForumInterface
     */
    public function addCategory(CategoryInterface $category)
    {
        $this->categories->add($category);

        return $this;
    }

    /**
     *
     * Remove Category
     *
     * @param  CategoryInterface $category
     * @return ForumInterface
     */
    public function removeCategory(CategoryInterface $category)
    {
        $this->categories->removeElement($category);

        return $this;
    }
}
