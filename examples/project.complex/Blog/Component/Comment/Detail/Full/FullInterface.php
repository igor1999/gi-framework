<?php

namespace Blog\Component\Comment\Detail\Full;

use Blog\Component\Comment\Detail\Base\DetailInterface;
use Blog\Component\Comment\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareInterface;
use Blog\Component\Comment\Detail\Full\View\ViewInterface;

interface FullInterface extends DetailInterface, HeaderAwareInterface, BodyAwareInterface, FooterAwareInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();
}