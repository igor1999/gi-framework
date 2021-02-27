<?php

namespace Blog\Component\Base\Gate;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->blogGetComponentFactory()->createLayout();
    }
}