<?php

namespace Prime\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Prime\Module\Call\Web\BaseCall;

use Prime\Component\Prime\Gate\Gate as PrimeGate;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Module\Call\Web\BaseCallInterface;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createPrime()
    {
        $routeTree = $this->primeGetRouteTree();

        return new BaseCall(
            $routeTree->getPrime(),
            function(BaseCallInterface $call)
            {
                (new PrimeGate($call))->dispatch();

                return true;
            }
        );
    }
}