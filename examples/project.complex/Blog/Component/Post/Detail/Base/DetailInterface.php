<?php

namespace Blog\Component\Post\Detail\Base;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Detail\Base\View\ViewInterface;

interface DetailInterface extends ComponentInterface
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