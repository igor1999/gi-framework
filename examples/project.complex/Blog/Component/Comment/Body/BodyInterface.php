<?php

namespace Blog\Component\Comment\Body;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Body\View\ViewInterface;

interface BodyInterface extends ComponentInterface
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