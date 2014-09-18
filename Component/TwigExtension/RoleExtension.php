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

namespace CCDNForum\ForumBundle\Component\TwigExtension;

use CCDNForum\ForumBundle\Component\Helper\RoleTransformer;

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
class RoleExtension extends \Twig_Extension
{
    /**
     *
     * @access protected
     * @var RoleTransformer $roleTransformer
     */
    protected $roleTransformer;

    /**
     *
     * @access public
     * @param RoleTransformer $roleTransformer
     */
    public function __construct(RoleTransformer $roleTransformer)
    {
        $this->roleTransformer = $roleTransformer;
    }

    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'roleUser'          => new \Twig_Function_Method($this, 'getUserRole'),
            'roleModerator'     => new \Twig_Function_Method($this, 'getModeratorRole'),
            'roleAdmin'         => new \Twig_Function_Method($this, 'getAdminRole'),
            'roleSuperAdmin'    => new \Twig_Function_Method($this, 'getSuperAdminRole'),
        );
    }

    public function getUserRole()
    {
        return $this->roleTransformer->getUserRole();
    }

    public function getModeratorRole()
    {
        return $this->roleTransformer->getModeratorRole();
    }

    public function getAdminRole()
    {
        return $this->roleTransformer->getAdminRole();
    }

    public function getSuperAdminRole()
    {
        return $this->roleTransformer->getSuperAdminRole();
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'ccdn_roles';
    }
}
