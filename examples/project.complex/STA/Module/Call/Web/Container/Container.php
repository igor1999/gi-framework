<?php

namespace STA\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use STA\Module\Call\Web\BaseCall;

use STA\Component\Switchers\Gate\Gate as SwitchersGate;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Module\Call\Web\BaseCallInterface;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createSwitchers()
    {
        $routeTree = $this->staGetRouteTree();

        return new BaseCall(
            $routeTree->getSwitchers(),
            function(BaseCallInterface $call)
            {
                (new SwitchersGate($call))->dispatch();

                return true;
            }
        );
    }
}