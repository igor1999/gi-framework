<?php

namespace Chat\Module\Call\Route\Tree\Socket\Conversation;

use GI\REST\Route\Segmented\Tree\CLI\TreeInterface as BaseInterface;

use Chat\Module\Call\Route\Tree\Socket\SocketInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\CLI\CLIInterface;

interface ConversationInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getDemon();

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getWaiting();

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getExpired();

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getCommon();
}