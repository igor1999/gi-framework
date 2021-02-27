<?php

namespace Blog\Component\Comment\Usecase\Creation;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Usecase\Creation\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface CreationInterface extends ComponentInterface
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