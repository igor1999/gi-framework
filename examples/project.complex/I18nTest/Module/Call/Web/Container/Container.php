<?php

namespace I18nTest\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use I18nTest\Module\Call\Web\BaseCall;

use I18nTest\Component\Message\Gate\Gate as MessageGate;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Module\Call\Web\BaseCallInterface;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createMessage()
    {
        $routes = $this->i18nTestGetRouteTree();

        return new BaseCall(
            $routes->getRoot(),
            function(BaseCallInterface $call)
            {
                (new MessageGate($call))->dispatch();

                return true;
            }
        );
    }
}