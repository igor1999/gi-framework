<?php

namespace Blog\Component\Post\Body\Full;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Body\Full\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface BodyInterface extends ComponentInterface
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