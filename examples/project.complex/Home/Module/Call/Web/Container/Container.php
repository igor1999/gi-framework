<?php

namespace Home\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Home\Module\Call\Web\BaseCall;

use Home\Component\Layout\Gate\Gate as LayoutGate;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

use Home\Module\Call\Web\BaseCallInterface;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createLayout()
    {
        $routes = $this->homeGetRouteTree();

        return new BaseCall(
            $routes->getRoot(),
            function(BaseCallInterface $call)
            {
                (new LayoutGate($call))->dispatch();

                return true;
            }
        );
    }
}