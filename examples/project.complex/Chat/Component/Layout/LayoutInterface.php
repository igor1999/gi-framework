<?php

namespace Chat\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;

use Chat\Component\Layout\View\ViewInterface;
use Chat\Component\Home\HomeInterface;
use Chat\Component\Conversation\ConversationInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @param HomeInterface $content
     * @return self
     * @throws \Exception
     */
    public function createHome(HomeInterface $content);

    /**
     * @param ConversationInterface $content
     * @return self
     * @throws \Exception
     */
    public function createConversation(ConversationInterface $content);
}