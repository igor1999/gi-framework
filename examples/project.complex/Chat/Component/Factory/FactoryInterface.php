<?php

namespace Chat\Component\Factory;

use GI\Component\Factory\Base\FactoryInterface as BaseInterface;

use Chat\Component\Layout\LayoutInterface;
use Chat\Component\Home\HomeInterface;
use Chat\Component\Conversation\ConversationInterface;

/**
 * Interface FactoryInterface
 * @package Chat\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method HomeInterface createHome()
 * @method ConversationInterface createConversation()
 */
interface FactoryInterface extends BaseInterface
{

}