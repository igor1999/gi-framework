<?php

namespace Chat\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Chat\Module\Call\Web\BaseCall;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Module\Call\Web\BaseCallInterface;

use Chat\Module\Call\Web\Container\Authentication\Authentication as AuthenticationCallContainer;

use Chat\Component\Home\Gate\Gate as HomeGate;
use Chat\Component\Conversation\Gate\Gate as ConversationGate;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->add(new AuthenticationCallContainer());
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createHome()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getHome(),
            function(BaseCallInterface $call)
            {
                (new HomeGate($call))->dispatch();

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createConversation()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getConversation(),
            function(BaseCallInterface $call)
            {
                (new ConversationGate($call))->dispatch();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }
}