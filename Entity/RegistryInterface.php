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
interface RegistryInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get cachedPostCount
     *
     * @return integer
     */
    public function getCachedPostCount();

    /**
     * Set cachedPostCount
     *
     * @param  integer  $cachedPostCount
     * @return Registry
     */
    public function setCachedPostCount($cachedPostCount);

    /**
     * Get cachedKarmaPositiveCount
     *
     * @return integer
     */
    public function getCachedKarmaPositiveCount();

    /**
     * Set cachedKarmaPositiveCount
     *
     * @param  integer  $cachedKarmaPositiveCount
     * @return Registry
     */
    public function setCachedKarmaPositiveCount($cachedKarmaPositiveCount);

    /**
     * Get cachedKarmaNegativeCount
     *
     * @return integer
     */
    public function getCachedKarmaNegativeCount();

    /**
     * Set cachedKarmaNegativeCount
     *
     * @param  integer  $cachedKarmaNegativeCount
     * @return Registry
     */
    public function setCachedKarmaNegativeCount($cachedKarmaNegativeCount);

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
     * @return Registry
     */
    public function setOwnedBy(UserInterface $ownedBy = null);
}
