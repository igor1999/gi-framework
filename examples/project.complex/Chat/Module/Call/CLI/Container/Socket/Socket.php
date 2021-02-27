<?php

namespace Chat\Module\Call\CLI\Container\Socket;

use GI\Application\Module\CallContainer\CLI\CLI as Base;
use Chat\Module\Call\CLI\Container\Socket\Conversation\Conversation as ConversationCallContainer;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Socket extends Base implements SocketInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Socket constructor.
     */
    public function __construct()
    {
        $this->add(new ConversationCallContainer());
    }
}