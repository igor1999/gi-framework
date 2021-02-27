<?php

namespace I18nTest\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;

use I18nTest\Component\Layout\View\ViewInterface;
use I18nTest\Component\Message\MessageInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @param MessageInterface $content
     * @return self
     */
    public function createMessage(MessageInterface $content);

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}