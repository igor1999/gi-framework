<?php

namespace Home\Component\Base;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

use Home\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->homeGetComponentFactory()->createLayout();
    }
}