<?php

namespace Blog\Component\Comment;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

interface CommentRecordAwareInterface
{
    /**
     * @return CommentRecordInterface
     */
    public function getComment();

    /**
     * @param CommentRecordInterface $comment
     * @return self
     */
    public function setComment(CommentRecordInterface $comment);
}