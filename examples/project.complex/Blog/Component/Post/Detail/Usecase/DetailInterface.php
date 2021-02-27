<?php

namespace Blog\Component\Post\Detail\Usecase;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Detail\Usecase\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface DetailInterface extends ComponentInterface
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