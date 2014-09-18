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

namespace CCDNForum\ForumBundle\Component\Dispatcher\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

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
class ModeratorTopicMoveEvent extends Event
{
    /**
     *
     * @access protected
     * @var \Symfony\Component\HttpFoundation\Request $request
     */
    protected $request;

    /**
     *
     * @access protected
     * @var \CCDNForum\ForumBundle\Entity\TopicInterface $topic
     */
    protected $topic;

    /**
     *
     * @access protected
     * @var \CCDNForum\ForumBundle\Entity\BoardInterface $oldBoard
     */
    protected $oldBoard;

    /**
     *
     * @access protected
     * @var \CCDNForum\ForumBundle\Entity\BoardInterface $newBoard
     */
    protected $newBoard;

    /**
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \CCDNForum\ForumBundle\Entity\TopicInterface       $topic
     */
    public function __construct(Request $request, BoardInterface $oldBoard, BoardInterface $newBoard, Topic $topic = null)
    {
        $this->request = $request;
        $this->topic = $topic;
        $this->oldBoard = $oldBoard;
        $this->newBoard = $newBoard;
    }

    /**
     *
     * @access public
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Entity\TopicInterface
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Entity\BoardInterface
     */
    public function getOldBoard()
    {
        return $this->oldBoard;
    }

    /**
     *
     * @access public
     * @return \CCDNForum\ForumBundle\Entity\BoardInterface
     */
    public function getNewBoard()
    {
        return $this->newBoard;
    }
}
