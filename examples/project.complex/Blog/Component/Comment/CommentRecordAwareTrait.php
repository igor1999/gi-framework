<?php

namespace Blog\Component\Comment;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

trait CommentRecordAwareTrait
{
    /**
     * @var CommentRecordInterface
     */
    private $comment;

    /**
     * @return CommentRecordInterface
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param CommentRecordInterface $comment
     * @return self
     */
    public function setComment(CommentRecordInterface $comment)
    {
        $this->comment = $comment;

        return $this;
    }
}