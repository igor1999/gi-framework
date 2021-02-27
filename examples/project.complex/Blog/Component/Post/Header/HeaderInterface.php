<?php

namespace Blog\Component\Post\Header;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Header\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface HeaderInterface extends ComponentInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return PostRecordInterface
     */
    public function getPost();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}