<?php

namespace Job\Component\Base\Gate;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->jobGetComponentFactory()->createLayout();
    }
}