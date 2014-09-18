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

namespace CCDNForum\ForumBundle\Controller;

use CCDNForum\ForumBundle\Entity\ForumInterface;
use CCDNForum\ForumBundle\Entity\BoardInterface;
use CCDNForum\ForumBundle\Entity\TopicInterface;

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
class UserTopicBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @param  \CCDNForum\ForumBundle\Entity\ForumInterface                        $forum
     * @param  \CCDNForum\ForumBundle\Entity\BoardInterface                        $board
     * @return \CCDNForum\ForumBundle\Form\Handler\TopicCreateFormHandler
     */
    protected function getFormHandlerToCreateTopic(ForumInterface $forum, BoardInterface $board)
    {
        $formHandler = $this->container->get('ccdn_forum_forum.form.handler.topic_create');

        $formHandler->setForum($forum);
        $formHandler->setBoard($board);
        $formHandler->setUser($this->getUser());
        $formHandler->setRequest($this->getRequest());

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param  \CCDNForum\ForumBundle\Entity\TopicInterface                        $topic
     * @return \CCDNForum\ForumBundle\Form\Handler\TopicCreateFormHandler
     */
    protected function getFormHandlerToReplyToTopic(TopicInterface $topic)
    {
        $formHandler = $this->container->get('ccdn_forum_forum.form.handler.post_create');

        $formHandler->setTopic($topic);
        $formHandler->setUser($this->getUser());
        $formHandler->setRequest($this->getRequest());

        return $formHandler;
    }
}
