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

namespace CCDNForum\ForumBundle\Component\Crumbs;

use CCDNForum\ForumBundle\Entity\ForumInterface;
use CCDNForum\ForumBundle\Entity\CategoryInterface;
use CCDNForum\ForumBundle\Entity\BoardInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;
use CCDNForum\ForumBundle\Entity\PostInterface;

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
class CrumbBuilder extends BaseCrumbBuilder
{
    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
        ;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
        ;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsCreate()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
            ->add('crumbs.admin.manage-forums.create', 'ccdn_forum_admin_forum_create')
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsEdit(ForumInterface $forum)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-forums.edit',
                    'params' => array(
                        '%forum_name%' => $forum->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_forum_edit',
                    'params' => array(
                        'forumId' => $forum->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsDelete(ForumInterface $forum)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-forums.delete',
                    'params' => array(
                        '%forum_name%' => $forum->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_forum_delete',
                    'params' => array(
                        'forumId' => $forum->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
        ;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesCreate()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
            ->add('crumbs.admin.manage-categories.create', 'ccdn_forum_admin_category_create')
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\CategoryInterface                     $category
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesEdit(CategoryInterface $category)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-categories.edit',
                    'params' => array(
                        '%category_name%' => $category->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_category_edit',
                    'params' => array(
                        'categoryId' => $category->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\CategoryInterface                     $category
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesDelete(CategoryInterface $category)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-categories.delete',
                    'params' => array(
                        '%category_name%' => $category->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_category_delete',
                    'params' => array(
                        'categoryId' => $category->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
        ;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsCreate()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
            ->add('crumbs.admin.manage-boards.create', 'ccdn_forum_admin_board_create')
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\BoardInterface                        $board
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsEdit(BoardInterface $board)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-boards.edit',
                    'params' => array(
                        '%board_name%' => $board->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_board_edit',
                    'params' => array(
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\BoardInterface                        $board
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsDelete(BoardInterface $board)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-boards.delete',
                    'params' => array(
                        '%board_name%' => $board->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_board_delete',
                    'params' => array(
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserCategoryIndex(ForumInterface $forum = null)
    {
        return $this->createCrumbTrail()
            ->add(
                $forum ?
                    $forum->getName() == 'default' ?  'Index' : $forum->getName() . ' Index'
                    :
                    'Index'
                ,
                array(
                    'route' => 'ccdn_forum_user_category_index',
                    'params' => array(
                        'forumName' => $forum ? $forum->getName() : 'default'
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\CategoryInterface                     $category
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserCategoryShow(ForumInterface $forum, CategoryInterface $category)
    {
        return $this->addUserCategoryIndex($forum)
            ->add(
                $category->getName(),
                array(
                    'route' => 'ccdn_forum_user_category_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'categoryId' => $category->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\BoardInterface                        $board
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserBoardShow(ForumInterface $forum, BoardInterface $board)
    {
        return $this->addUserCategoryShow($forum, $board->getCategory())
            ->add(
                $board->getName(),
                array(
                    'route' => 'ccdn_forum_user_board_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\TopicInterface                        $topic
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserTopicShow(ForumInterface $forum, TopicInterface $topic)
    {
        return $this->addUserBoardShow($forum, $topic->getBoard())
            ->add(
                $topic->getTitle(),
                array(
                    'route' => 'ccdn_forum_user_topic_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId' => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\BoardInterface                        $board
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserTopicCreate(ForumInterface $forum, BoardInterface $board)
    {
        return $this->addUserBoardShow($forum, $board)
            ->add(
                array(
                    'label' => 'crumbs.user.topic.create',
                ),
                array(
                    'route' => 'ccdn_forum_user_topic_create',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\TopicInterface                        $topic
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserTopicReply(ForumInterface $forum, TopicInterface $topic)
    {
        return $this->addUserTopicShow($forum, $topic)
            ->add(
                array(
                    'label' => 'crumbs.user.topic.reply',
                ),
                array(
                    'route' => 'ccdn_forum_user_topic_reply',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId' => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\PostInterface                         $post
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserPostShow(ForumInterface $forum, PostInterface $post)
    {
        return $this->addUserTopicShow($forum, $post->getTopic())
            ->add(
                '# ' . $post->getId(),
                array(
                    'route' => 'ccdn_forum_user_post_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'postId' => $post->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\PostInterface                         $post
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserPostDelete(ForumInterface $forum, PostInterface $post)
    {
        return $this->addUserPostShow($forum, $post)
            ->add(
                array(
                    'label' => 'crumbs.user.post.delete',
                ),
                array(
                    'route' => 'ccdn_forum_user_post_delete',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'postId' => $post->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserSubscriptionIndex(ForumInterface $forum)
    {
        return $this->addUserCategoryIndex($forum)
            ->add(
                array(
                    'label' => 'crumbs.user.subscription.index',
                ),
                array(
                    'route' => 'ccdn_forum_user_subscription_index',
                    'params' => array(
                        'forumName' => $forum->getName()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\TopicInterface                        $topic
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addModeratorTopicDelete(ForumInterface $forum, TopicInterface $topic)
    {
        return $this->addUserTopicShow($forum, $topic)
            ->add(
                array(
                    'label' => 'crumbs.moderator.topic.delete',
                ),
                array(
                    'route' => 'ccdn_forum_moderator_topic_delete',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId'   => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\TopicInterface                        $topic
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addModeratorTopicChangeBoard(ForumInterface $forum, TopicInterface $topic)
    {
        return $this->addUserTopicShow($forum, $topic)
            ->add(
                array(
                    'label' => 'crumbs.moderator.topic.move',
                ),
                array(
                    'route' => 'ccdn_forum_moderator_topic_change_board',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId'   => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\PostInterface                         $post
     * @return \CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addModeratorPostUnlock(ForumInterface $forum, PostInterface $post)
    {
        return $this->addUserPostShow($forum, $post)
            ->add(
                array(
                    'label' => 'crumbs.moderator.post.unlock',
                ),
                array(
                    'route' => 'ccdn_forum_moderator_post_unlock',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'postId'   => $post->getId()
                    )
                )
            )
        ;
    }
}
