<?php

namespace Blog\Component\Post\Detail\Base;

use GI\Component\Base\ComponentInterface;

interface DetailInterface extends ComponentInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}