<?php

namespace Blog\Component\Comment\Footer;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Footer\View\ViewInterface;

interface FooterInterface extends ComponentInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}