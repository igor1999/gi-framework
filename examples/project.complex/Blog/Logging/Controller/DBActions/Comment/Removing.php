<?php

namespace Blog\Logging\Controller\DBActions\Comment;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

class Removing extends AbstractComment implements RemovingInterface
{
    const TITLE = 'removed comment';


    /**
     * @param CommentRecordInterface $comment
     * @return string
     * @throws \Exception
     */
    protected function createText(CommentRecordInterface $comment)
    {
        return <<<TEXT

ID:         {$comment->getId()}
Author:     {$comment->getUser()->getLogin()}
Text:       {$comment->getText()}

Post ID:    {$comment->getPost()->getId()}
Post Title: {$comment->getPost()->getTitle()}

Removed by: {$this->blogGetIdentity()->getLogin()}

TEXT;
    }
}