<?php

namespace Blog\Component\Comment\Detail\Footerless;

use Blog\Component\Comment\Detail\Base\DetailInterface;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareInterface;
use Blog\Component\Comment\Detail\Footerless\View\ViewInterface;

interface FooterlessInterface extends DetailInterface, HeaderAwareInterface, BodyAwareInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();
}