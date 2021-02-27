<?php

namespace Chat\Socket\Conversation\Waiting;

use GI\SocketDemon\Exchange\Processor\ProcessorInterface;

interface WaitingInterface extends ProcessorInterface
{
    /**
     * @return self
     * @throws \Exception
     */
    public function process();
}