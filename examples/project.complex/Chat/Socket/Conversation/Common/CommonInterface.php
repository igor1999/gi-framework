<?php

namespace Chat\Socket\Conversation\Common;

use GI\SocketDemon\Exchange\Processor\ProcessorInterface;

interface CommonInterface extends ProcessorInterface
{
    /**
     * @return self
     * @throws \Exception
     */
    public function process();
}