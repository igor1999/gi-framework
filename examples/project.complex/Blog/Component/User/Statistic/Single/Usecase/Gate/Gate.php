<?php

namespace Blog\Component\User\Statistic\Single\Usecase\Gate;

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
        $id   = $this->getCall()->getRoute()->getParam('id');
        $data = $this->getCall()->getRequest()->getQuery()->extract();

        $component = $this->blogGetComponentFactory()->getStatisticFactory()->createSingle($id, $data);

        return $this->getLayout()->createStatisticSingle($component);
    }
}