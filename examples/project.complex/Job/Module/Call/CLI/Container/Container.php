<?php

namespace Job\Module\Call\CLI\Container;

use GI\Application\Module\CallContainer\CLI\CLI as Base;
use Job\Module\Call\CLI\BaseCall;
use Job\Process\Delay\Delay;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Module\Call\CLI\BaseCallInterface;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createDelay()
    {
        return new BaseCall(
            $this->jobGetRouteTree()->getProcessTree()->getExecutionTree()->getStart(),
            function(BaseCallInterface $call)
            {
                get_class($call);
                new Delay();

                return true;
            }
        );
    }
}