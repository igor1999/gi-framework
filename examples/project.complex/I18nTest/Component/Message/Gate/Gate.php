<?php

namespace I18nTest\Component\Message\Gate;

use I18nTest\Component\Base\AbstractUsecase as Base;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function createUsecase()
    {
        $message = $this->i18nTestGetComponentFactory()->createMessage();

        return $this->getLayout()->createMessage($message);
    }
}