<?php

namespace Chat\Socket\Conversation\Result\Factory;

use GI\SocketDemon\Exchange\Response\Result\Factory\AbstractFactory as Base;

use Chat\Socket\Conversation\Result\Join\Join;
use Chat\Socket\Conversation\Result\Leave\Leave;
use Chat\Socket\Conversation\Result\Message\Message;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use Chat\Socket\Conversation\Result\Join\JoinInterface;
use Chat\Socket\Conversation\Result\Leave\LeaveInterface;
use Chat\Socket\Conversation\Result\Message\MessageInterface;

/**
 * Class Factory
 * @package Chat\Socket\Conversation\Result\Factory
 *
 * @method JoinInterface createJoin()
 * @method LeaveInterface createLeave()
 * @method MessageInterface createMessage($text)
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->set(Join::class)
            ->set(Leave::class)
            ->set(Message::class);
    }
}