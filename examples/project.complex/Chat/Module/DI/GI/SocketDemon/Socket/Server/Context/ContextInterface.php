<?php

namespace Chat\Module\DI\GI\SocketDemon\Socket\Server\Context;

use GI\SocketDemon\Socket\Server\Context\ContextInterface as BaseInterface;

interface ContextInterface extends BaseInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function getAddress();
}