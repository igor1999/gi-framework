<?php

namespace Job\Module\Call\Web\Container\Process;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Job\Module\Call\Web\BaseCall;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Module\Call\Web\BaseCallInterface;

use Job\Component\Process\Gate\Gate as ProcessGate;

class Process extends Base implements ProcessInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createProcess()
    {
        return new BaseCall(
            $this->jobGetRouteTree()->getProcessTree()->getProcess(),
            function(BaseCallInterface $call)
            {
                (new ProcessGate($call))->dispatch();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createStart()
    {
        return new BaseCall(
            $this->jobGetRouteTree()->getProcessTree()->getStart(),
            function(BaseCallInterface $call)
            {
                (new ProcessGate($call))->start();

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createCheck()
    {
        return new BaseCall(
            $this->jobGetRouteTree()->getProcessTree()->getCheck(),
            function(BaseCallInterface $call)
            {
                (new ProcessGate($call))->check();

                return true;
            }
        );
    }
}