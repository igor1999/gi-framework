<?php

namespace STA\Component\Switchers\Gate;

use STA\Component\Base\AbstractUsecase as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $switchers = $this->staGetComponentFactory()->createSwitchers();

        return $this->getLayout()->createSwitchers($switchers);
    }
}