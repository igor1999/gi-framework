<?php

namespace Chat\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Chat\Module\Call\Route\Tree\Socket\Socket as SocketTree;
use Chat\Module\Call\Route\Tree\Authentication\Authentication as AuthenticationTree;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

use Chat\Module\Call\Route\Tree\Authentication\AuthenticationInterface as AuthenticationTreeInterface;
use Chat\Module\Call\Route\Tree\Socket\SocketInterface as SocketTreeInterface;

/**
 * Class Root
 * @package Chat\Module\Call\Route\Tree
 *
 * @method AuthenticationTreeInterface getAuthenticationTree()
 * @method SocketTreeInterface getSocketTree()
 */
class Root extends Base implements RootInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Root constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('SocketTree', SocketTree::class)
            ->setNamed('AuthenticationTree',  AuthenticationTree::class);
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/chat';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getHome()
    {
        return $this->createUriPathWithMethodGet('');
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getConversation()
    {
        return $this->createUriPathWithMethodGet('/conversation');
    }
}