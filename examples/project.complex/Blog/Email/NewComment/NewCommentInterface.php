<?php

namespace Blog\Email\NewComment;

use GI\Email\Controller\ControllerInterface;
use Blog\RDB\ORM\Comment\RecordInterface;

interface NewCommentInterface extends ControllerInterface
{
    /**
     * @return RecordInterface
     */
    public function getRecord();

    /**
     * @return bool
     * @throws \Exception
     */
    public function send();
}