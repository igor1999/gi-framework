<?php

namespace Job\Process\Delay\Context;

use Job\ServiceLocator\ServiceLocatorIntegralTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return int
     */
    public function getInterval()
    {
        return 10;
    }

    /**
     * @return int
     */
    public function getTimeTotal()
    {
        return 60;
    }
}