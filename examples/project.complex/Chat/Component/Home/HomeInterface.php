<?php

namespace Chat\Component\Home;

use GI\Component\Base\ComponentInterface;
use Chat\Component\Home\View\ViewInterface;

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