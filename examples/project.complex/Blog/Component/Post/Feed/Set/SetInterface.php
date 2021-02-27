<?php

namespace Blog\Component\Post\Feed\Set;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Feed\Set\View\ViewInterface;

interface SetInterface extends ComponentInterface
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