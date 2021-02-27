<?php

namespace Blog\Component\Comment\Detail\Base;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Detail\Base\View\ViewInterface;

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