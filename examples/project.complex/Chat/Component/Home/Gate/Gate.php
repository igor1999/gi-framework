<?php

namespace Chat\Component\Home\Gate;

use Chat\Component\Base\Gate\AbstractUsecase as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $home = $this->chatGetComponentFactory()->createHome();

        return $this->getLayout()->createHome($home);
    }
}