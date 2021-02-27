<?php

namespace Chat\Module\Call\Route\Tree\Socket;

use GI\REST\Route\Segmented\Tree\CLI\AbstractTree as Base;

use Chat\Module\Call\Route\Tree\Socket\Conversation\Conversation as ConversationTree;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use Chat\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;

use Chat\Module\Call\Route\Tree\Socket\Conversation\ConversationInterface as ConversationTreeInterface;

/**
 * Class Socket
 * @package Chat\Module\Call\Route\Tree\Socket
 *
 * @method ConversationTreeInterface getConversationTree()
 */
class Socket extends Base implements SocketInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Socket constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('ConversationTree', ConversationTree::class);
    }

    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->chatGetRouteTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/socket';
    }
}