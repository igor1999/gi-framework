<?php

namespace Chat\Component\Conversation\View\Messages;

use GI\SocketDemon\Exchange\Response\Messages\MessagesInterface as BaseInterface;

interface MessagesInterface extends BaseInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function getJSON();
}