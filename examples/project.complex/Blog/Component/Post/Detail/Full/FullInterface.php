<?php

namespace Blog\Component\Post\Detail\Full;

use Blog\Component\Post\Detail\Base\DetailInterface;
use Blog\Component\Post\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;
use Blog\Component\Post\Detail\Full\View\ViewInterface;

interface FullInterface extends DetailInterface, HeaderAwareInterface, FullBodyAwareInterface, FooterAwareInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();
}