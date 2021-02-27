<?php

namespace Blog\RDB\ORM\Comment;

use GI\RDB\ORM\Set\SetInterface as BaseInterface;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

interface SetInterface extends BaseInterface
{
    /**
     * @param int $index
     * @return CommentRecordInterface
     * @throws \Exception
     */
    public function get($index);

    /**
     * @return CommentRecordInterface
     * @throws \Exception
     */
    public function getFirst();

    /**
     * @return CommentRecordInterface
     * @throws \Exception
     */
    public function getLast();

    /**
     * @return CommentRecordInterface[]
     */
    public function getItems();
}