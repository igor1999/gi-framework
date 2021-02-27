<?php

namespace Chat\Module\DI\GI\SocketDemon\Exchange\Request\Context;

use GI\SocketDemon\Exchange\Request\Context\AbstractContext as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    const DEMON = 'conversation';


    /**
     * @return string
     */
    public function getDemon()
    {
        return static::DEMON;
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getRouteForCommonRequest()
    {
        return $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getCommon()->build();
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getRouteForExpirationRequest()
    {
        return $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getExpired()->build();
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getRouteForWaitingRequest()
    {
        return $this->chatGetRouteTree()->getSocketTree()->getConversationTree()->getWaiting()->build();
    }
}