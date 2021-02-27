<?php

namespace Prime\Component\Base;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->primeGetComponentFactory()->createLayout();
    }
}