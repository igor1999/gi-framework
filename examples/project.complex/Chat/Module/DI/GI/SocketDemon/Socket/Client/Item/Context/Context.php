<?php

namespace Chat\Module\DI\GI\SocketDemon\Socket\Client\Item\Context;

use GI\SocketDemon\Socket\Client\Item\Context\AbstractContext as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return int
     */
    public function getConfirmationInterval()
    {
        return 3;
    }

    /**
     * @return int
     */
    public function getInactivityInterval()
    {
        return 600;
    }
}