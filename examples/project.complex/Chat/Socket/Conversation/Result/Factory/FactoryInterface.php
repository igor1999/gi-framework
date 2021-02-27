<?php

namespace Chat\Socket\Conversation\Result\Factory;

use GI\SocketDemon\Exchange\Response\Result\Factory\FactoryInterface as BaseInterface;

use Chat\Socket\Conversation\Result\Join\JoinInterface;
use Chat\Socket\Conversation\Result\Leave\LeaveInterface;
use Chat\Socket\Conversation\Result\Message\MessageInterface;

/**
 * Interface FactoryInterface
 * @package Chat\Socket\Conversation\Result\Factory
 *
 * @method JoinInterface createJoin()
 * @method LeaveInterface createLeave()
 * @method MessageInterface createMessage($text)
 */
interface FactoryInterface extends BaseInterface
{

}