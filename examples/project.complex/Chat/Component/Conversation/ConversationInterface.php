<?php

namespace Chat\Component\Conversation;

use Chat\Component\Conversation\View\WidgetInterface;
use GI\Component\Base\ComponentInterface;

interface ConversationInterface extends ComponentInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}