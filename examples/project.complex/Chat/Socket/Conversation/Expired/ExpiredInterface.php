<?php

namespace Chat\Socket\Conversation\Expired;

use GI\SocketDemon\Exchange\Processor\ProcessorInterface;

interface ExpiredInterface extends ProcessorInterface
{
    /**
     * @return self
     * @throws \Exception
     */
    public function process();
}