<?php

namespace Blog\Component\Post\Footer;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Footer\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface FooterInterface extends ComponentInterface
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