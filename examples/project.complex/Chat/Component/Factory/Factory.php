<?php

namespace Chat\Component\Factory;

use GI\Component\Factory\Base\AbstractFactory as Base;

use Chat\Component\Layout\Layout;
use Chat\Component\Home\Home;
use Chat\Component\Conversation\Conversation;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use Chat\Component\Layout\LayoutInterface;
use Chat\Component\Home\HomeInterface;
use Chat\Component\Conversation\ConversationInterface;

/**
 * Class Factory
 * @package Chat\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method HomeInterface createHome()
 * @method ConversationInterface createConversation()
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

        $this->set(Layout::class)
            ->set(Home::class)
            ->set(Conversation::class);
    }
}