<?php

namespace CCDNForum\ForumBundle\Component\Helper;

class RoleTransformer
{
    protected $roles;

    public function __construct(array $roles)
    {
        $this->roles = $roles;
    }

    public function getUserRole()
    {
        return isset($this->roles['user']) ? $this->roles['user'] : 'ROLE_USER';
    }

    public function getModeratorRole()
    {
        return isset($this->roles['moderator']) ? $this->roles['moderator'] : 'ROLE_MODERATOR';
    }

    public function getAdminRole()
    {
        return isset($this->roles['admin']) ? $this->roles['admin'] : 'ROLE_ADMIN';
    }

    public function getSuperAdminRole()
    {
        return isset($this->roles['super_admin']) ? $this->roles['super_admin'] : 'ROLE_SUPER_ADMIN';
    }
}