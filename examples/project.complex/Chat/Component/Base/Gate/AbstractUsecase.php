<?php

namespace Chat\Component\Base\Gate;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->chatGetComponentFactory()->createLayout();
    }
}