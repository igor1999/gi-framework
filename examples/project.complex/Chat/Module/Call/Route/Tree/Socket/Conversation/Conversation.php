<?php

namespace Chat\Module\Call\Route\Tree\Socket\Conversation;

use GI\REST\Route\Segmented\Tree\CLI\AbstractTree as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Module\Call\Route\Tree\Socket\SocketInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\CLI\CLIInterface;

class Conversation extends Base implements ConversationInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->chatGetRouteTree()->getSocketTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/conversation';
    }

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getDemon()
    {
        return $this->createCLI('/demon');
    }

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getWaiting()
    {
        return $this->createCLI('/waiting');
    }

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getExpired()
    {
        return $this->createCLI('/expired');
    }

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getCommon()
    {
        return $this->createCLI('/common');
    }
}