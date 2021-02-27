<?php

namespace Blog\Logging\Controller\DBActions\Comment;

use GI\Logger\Controller\ControllerInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

interface CommentInterface extends ControllerInterface
{
    /**
     * @param CommentRecordInterface $comment
     * @return self
     * @throws \Exception
     */
    public function log(CommentRecordInterface $comment);
}