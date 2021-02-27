<?php

namespace Chat\Module\DI\GI\SocketDemon\Demon\Context;

use Chat\Module\DI\GI\SocketDemon\Exchange\Request\Context\Context as RequestContext;

use Chat\ServiceLocator\ServiceLocatorIntegralTrait;

use GI\SocketDemon\Exchange\Request\Context\ContextInterface as RequestContextInterface;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return \Closure
     */
    public function getActivityChecker()
    {
        return function()
        {
            /** @var RequestContextInterface $context */
            $context = $this->giGetDi(RequestContextInterface::class, RequestContext::class);
            $name    = $context->getDemon();

            return ($this->chatGetRDBORMFactory()->createDemonRecord($name)->getStop() == 1);
        };
    }
}