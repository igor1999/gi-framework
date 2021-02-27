<?php

namespace Blog\Component\User\Statistic\Totally\Usecase\Gate;

use Blog\Component\Base\Gate\AbstractUsecase as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $data = $this->getCall()->getRequest()->getQuery()->extract();

        $component = $this->blogGetComponentFactory()->getStatisticFactory()->createTotally($data);

        return $this->getLayout()->createStatisticTotally($component);
    }
}