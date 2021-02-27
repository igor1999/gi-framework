<?php

namespace Job\Component\Home\Gate;

use Job\Component\Base\Gate\AbstractUsecase as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $home = $this->jobGetComponentFactory()->createHome();

        return $this->getLayout()->createHome($home);
    }
}