<?php

namespace Chat\Module\Call\Route\Tree\Socket;

use GI\REST\Route\Segmented\Tree\CLI\TreeInterface as BaseInterface;

use Chat\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;

use Chat\Module\Call\Route\Tree\Socket\Conversation\ConversationInterface as ConversationTreeInterface;

/**
 * Interface SocketInterface
 * @package Chat\Module\Call\Route\Tree\Socket
 *
 * @method ConversationTreeInterface getConversationTree()
 */
interface SocketInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();
}