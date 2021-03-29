<?php

namespace Blog\Component\Comment\Detail\Base;

use GI\Component\Base\ComponentInterface;

interface DetailInterface extends ComponentInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}