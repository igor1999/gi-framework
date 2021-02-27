<?php

namespace Chat\Module\DI\GI\SocketDemon\Socket\Client\Collection\Context;

use Chat\ServiceLocator\ServiceLocatorIntegralTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return int
     */
    public function getLimit()
    {
        return 50;
    }

    /**
     * @return bool
     */
    public function allowPushCalls()
    {
        return false;
    }
}