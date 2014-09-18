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

use CCDNForum\ForumBundle\Entity\ForumInterface;
use CCDNForum\ForumBundle\Entity\CategoryInterface;
use CCDNForum\ForumBundle\Entity\BoardInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;
use CCDNForum\ForumBundle\Entity\PostInterface;
use CCDNForum\ForumBundle\Entity\SubscriptionInterface;

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
class AuthorizerExtension extends \Twig_Extension
{
    /**
     *
     * @access protected
     * @var \CCDNForum\ForumBundle\Component\Security\Authorizer $authorizer
     */
    protected $authorizer;

    /**
     *
     * @access public
     * @param \CCDNForum\ForumBundle\Component\Security\Authorizer $authorizer
     */
    public function __construct($authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'canShowForum'            => new \Twig_Function_Method($this, 'canShowForum'),
            'canShowCategory'         => new \Twig_Function_Method($this, 'canShowCategory'),
            'canShowBoard'            => new \Twig_Function_Method($this, 'canShowBoard'),
            'canCreateTopicOnBoard'   => new \Twig_Function_Method($this, 'canCreateTopicOnBoard'),
            'canReplyToTopicOnBoard'  => new \Twig_Function_Method($this, 'canReplyToTopicOnBoard'),
            'canShowTopic'            => new \Twig_Function_Method($this, 'canShowTopic'),
            'canReplyToTopic'         => new \Twig_Function_Method($this, 'canReplyToTopic'),
            'canDeleteTopic'          => new \Twig_Function_Method($this, 'canDeleteTopic'),
            'canRestoreTopic'         => new \Twig_Function_Method($this, 'canRestoreTopic'),
            'canCloseTopic'           => new \Twig_Function_Method($this, 'canCloseTopic'),
            'canReopenTopic'          => new \Twig_Function_Method($this, 'canReopenTopic'),
            'canTopicChangeBoard'     => new \Twig_Function_Method($this, 'canTopicChangeBoard'),
            'canStickyTopic'          => new \Twig_Function_Method($this, 'canStickyTopic'),
            'canUnstickyTopic'        => new \Twig_Function_Method($this, 'canUnstickyTopic'),
            'canShowPost'             => new \Twig_Function_Method($this, 'canShowPost'),
            'canEditPost'             => new \Twig_Function_Method($this, 'canEditPost'),
            'canDeletePost'           => new \Twig_Function_Method($this, 'canDeletePost'),
            'canRestorePost'          => new \Twig_Function_Method($this, 'canRestorePost'),
            'canLockPost'             => new \Twig_Function_Method($this, 'canLockPost'),
            'canUnlockPost'           => new \Twig_Function_Method($this, 'canUnlockPost'),
            'canSubscribeToTopic'     => new \Twig_Function_Method($this, 'canSubscribeToTopic'),
            'canUnsubscribeFromTopic' => new \Twig_Function_Method($this, 'canUnsubscribeFromTopic'),
        );
    }

    public function canShowForum(ForumInterface $forum)
    {
        return $this->authorizer->canShowForum($forum);
    }

    public function canShowCategory(CategoryInterface $category, ForumInterface $forum = null)
    {
        return $this->authorizer->canShowCategory($category, $forum);
    }

    public function canShowBoard(BoardInterface $board, ForumInterface $forum = null)
    {
        return $this->authorizer->canShowBoard($board, $forum);
    }

    public function canCreateTopicOnBoard(BoardInterface $board, ForumInterface $forum = null)
    {
        return $this->authorizer->canCreateTopicOnBoard($board, $forum);
    }

    public function canReplyToTopicOnBoard(BoardInterface $board, ForumInterface $forum = null)
    {
        return $this->authorizer->canReplyToTopicOnBoard($board, $forum);
    }

    public function canShowTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canShowTopic($topic, $forum);
    }

    public function canReplyToTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canReplyToTopic($topic, $forum);
    }

    public function canDeleteTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canDeleteTopic($topic, $forum);
    }

    public function canRestoreTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canRestoreTopic($topic, $forum);
    }

    public function canCloseTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canCloseTopic($topic, $forum);
    }

    public function canReopenTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canReopenTopic($topic, $forum);
    }

    public function canTopicChangeBoard(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canTopicChangeBoard($topic, $forum);
    }

    public function canStickyTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canStickyTopic($topic, $forum);
    }

    public function canUnstickyTopic(TopicInterface $topic, ForumInterface $forum = null)
    {
        return $this->authorizer->canUnstickyTopic($topic, $forum);
    }

    public function canShowPost(PostInterface $post, ForumInterface $forum = null)
    {
        return $this->authorizer->canShowPost($post, $forum);
    }

    public function canEditPost(PostInterface $post, ForumInterface $forum = null)
    {
        return $this->authorizer->canEditPost($post, $forum);
    }

    public function canDeletePost(PostInterface $post, ForumInterface $forum = null)
    {
        return $this->authorizer->canDeletePost($post, $forum);
    }

    public function canRestorePost(PostInterface $post, ForumInterface $forum = null)
    {
        return $this->authorizer->canRestorePost($post, $forum);
    }

    public function canLockPost(PostInterface $post, ForumInterface $forum = null)
    {
        return $this->authorizer->canLockPost($post, $forum);
    }

    public function canUnlockPost(PostInterface $post, ForumInterface $forum = null)
    {
        return $this->authorizer->canUnlockPost($post, $forum);
    }

    public function canSubscribeToTopic(TopicInterface $topic, ForumInterface $forum = null, SubscriptionInterface $subscription = null)
    {
        return $this->authorizer->canSubscribeToTopic($topic, $forum, $subscription);
    }

    public function canUnsubscribeFromTopic(TopicInterface $topic, ForumInterface $forum = null, SubscriptionInterface $subscription = null)
    {
        return $this->authorizer->canUnsubscribeFromTopic($topic, $forum, $subscription);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'authorizer';
    }
}
