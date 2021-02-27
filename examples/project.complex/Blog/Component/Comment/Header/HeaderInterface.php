<?php

namespace Blog\Component\Comment\Header;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Header\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as CommentRecordInterface;

interface HeaderInterface extends ComponentInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return CommentRecordInterface
     */
    public function getComment();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}