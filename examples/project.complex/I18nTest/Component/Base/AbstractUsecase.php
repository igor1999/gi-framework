<?php

namespace I18nTest\Component\Base;

use GI\Component\Base\Gate\Usecase\AbstractUsecase as Base;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Component\Layout\LayoutInterface;

abstract class AbstractUsecase extends Base implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function getLayout()
    {
        return $this->i18nTestGetComponentFactory()->createLayout();
    }
}