<?php

namespace Job\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Job\Module\Call\Web\BaseCall;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Module\Call\Web\BaseCallInterface;

use Job\Module\Call\Web\Container\Authentication\Authentication as AuthenticationCallContainer;
use Job\Module\Call\Web\Container\Process\Process as ProcessCallContainer;

use Job\Component\Home\Gate\Gate as HomeGate;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->add(new AuthenticationCallContainer())
            ->add(new ProcessCallContainer());
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createHome()
    {
        return new BaseCall(
            $this->jobGetRouteTree()->getHome(),
            function(BaseCallInterface $call)
            {
               (new HomeGate($call))->dispatch();

                return true;
            }
        );
    }
}