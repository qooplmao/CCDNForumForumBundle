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

namespace CCDNForum\ForumBundle\Model\FrontModel;

use Doctrine\Common\Collections\ArrayCollection;
use CCDNForum\ForumBundle\Model\FrontModel\BaseModel;
use CCDNForum\ForumBundle\Model\FrontModel\ModelInterface;
use CCDNForum\ForumBundle\Entity\ForumInterface;

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
class ForumModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Entity\ForumInterface
     */
    public function createForum()
    {
        return $this->getManager()->createForum();
    }

    /**
     *
     * @access public
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllForums()
    {
        return $this->getRepository()->findAllForums();
    }

    /**
     *
     * @access public
     * @param  string                              $forumName
     * @return \CCDNForum\ForumBundle\Entity\ForumInterface
     */
    public function findOneForumById($forumId)
    {
        return $this->getRepository()->findOneForumById($forumId);
    }

    /**
     *
     * @access public
     * @param  string                              $forumName
     * @return \CCDNForum\ForumBundle\Entity\ForumInterface
     */
    public function findOneForumByName($forumName)
    {
        return $this->getRepository()->findOneForumByName($forumName);
    }

    /**
     *
     * @access public
     * @param \CCDNForum\ForumBundle\Entity\ForumInterface $forum
     */
    public function saveForum(ForumInterface $forum)
    {
        return $this->getManager()->saveForum($forum);
    }

    /**
     *
     * @access public
     * @param \CCDNForum\ForumBundle\Entity\ForumInterface $forum
     */
    public function updateForum(ForumInterface $forum)
    {
        return $this->getManager()->updateForum($forum);
    }

    /**
     *
     * @access public
     * @param \CCDNForum\ForumBundle\Entity\ForumInterface $forum
     */
    public function deleteForum(ForumInterface $forum)
    {
        return $this->getManager()->deleteForum($forum);
    }

    /**
     *
     * @access public
     * @param \Doctrine\Common\Collections\ArrayCollection $categories
     * @param \CCDNForum\ForumBundle\Entity\ForumInterface          $forum
     */
    public function reassignCategoriesToForum(ArrayCollection $categories, ForumInterface $forum = null)
    {
        return $this->getManager()->reassignCategoriesToForum($categories, $forum);
    }
}
