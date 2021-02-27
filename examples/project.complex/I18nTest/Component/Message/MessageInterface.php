<?php

namespace I18nTest\Component\Message;

use GI\Component\Base\ComponentInterface;

use I18nTest\Component\Message\View\ViewInterface;

interface MessageInterface extends ComponentInterface
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