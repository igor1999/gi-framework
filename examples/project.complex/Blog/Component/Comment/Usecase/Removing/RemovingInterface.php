<?php

namespace Blog\Component\Comment\Usecase\Removing;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Usecase\Removing\View\ViewInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

interface RemovingInterface extends ComponentInterface
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

    /**
     * @return string
     * @throws \Exception
     */
    public function delete();
}