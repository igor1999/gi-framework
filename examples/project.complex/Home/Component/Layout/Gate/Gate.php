<?php

namespace Home\Component\Layout\Gate;

use Home\Component\Base\AbstractUsecase as Base;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

use Home\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function createUsecase()
    {
        return $this->getLayout()->createHome();
    }
}