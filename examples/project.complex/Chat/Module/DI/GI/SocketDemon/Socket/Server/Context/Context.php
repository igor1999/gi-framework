<?php

namespace Chat\Module\DI\GI\SocketDemon\Socket\Server\Context;

use Chat\ServiceLocator\ServiceLocatorIntegralTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getAddress()
    {
        return '127.0.0.1';
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return 8080;
    }
}