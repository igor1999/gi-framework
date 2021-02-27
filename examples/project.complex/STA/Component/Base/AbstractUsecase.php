<?php

namespace STA\Component\Base;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->staGetComponentFactory()->createLayout();
    }
}