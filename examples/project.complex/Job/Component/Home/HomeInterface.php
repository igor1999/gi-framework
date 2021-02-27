<?php

namespace Job\Component\Home;

use GI\Component\Base\ComponentInterface;
use Job\Component\Home\View\ViewInterface;

interface HomeInterface extends ComponentInterface
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