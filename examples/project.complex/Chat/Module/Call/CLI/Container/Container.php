<?php

namespace Chat\Module\Call\CLI\Container;

use GI\Application\Module\CallContainer\CLI\CLI as Base;
use Chat\Module\Call\CLI\Container\Socket\Socket as SocketCallContainer;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->add(new SocketCallContainer());
    }
}