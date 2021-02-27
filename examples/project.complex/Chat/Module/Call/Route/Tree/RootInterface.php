<?php

namespace Chat\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

use Chat\Module\Call\Route\Tree\Authentication\AuthenticationInterface as AuthenticationTreeInterface;
use Chat\Module\Call\Route\Tree\Socket\SocketInterface as SocketTreeInterface;

/**
 * Interface RootInterface
 * @package Chat\Module\Call\Route\Tree
 *
 * @method AuthenticationTreeInterface getAuthenticationTree()
 * @method SocketTreeInterface getSocketTree()
 */
interface RootInterface extends BaseInterface
{
    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getHome();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getConversation();
}