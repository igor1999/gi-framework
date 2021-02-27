<?php

namespace Chat\Module\Call\CLI\Container\Socket\Conversation;

use GI\Application\Module\CallContainer\CLI\CLI as Base;
use Chat\Module\Call\CLI\BaseCall;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Module\Call\CLI\BaseCallInterface;

use GI\SocketDemon\Demon\Demon as SocketDemon;
use Chat\Socket\Conversation\Common\Common as ChatConversationCommon;
use Chat\Socket\Conversation\Expired\Expired as ChatConversationExpired;
use Chat\Socket\Conversation\Waiting\Waiting as ChatConversationWaiting;

class Conversation extends Base implements ConversationInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createDemon()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getDemon(),
            function(BaseCallInterface $call)
            {
                if (isset($call)) {
                    (new SocketDemon())->run();
                }

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createCommon()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getCommon(),
            function(BaseCallInterface $call)
            {
                if (isset($call)) {
                    echo (new ChatConversationCommon())->process()->getJSON();
                }

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createExpired()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getExpired(),
            function(BaseCallInterface $call)
            {
                if (isset($call)) {
                    echo (new ChatConversationExpired())->process()->getJSON();
                }

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createWaiting()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getWaiting(),
            function(BaseCallInterface $call)
            {
                if (isset($call)) {
                    echo (new ChatConversationWaiting())->process()->getJSON();
                }

                return true;
            }
        );
    }
}