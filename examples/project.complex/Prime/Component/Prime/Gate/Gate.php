<?php

namespace Prime\Component\Prime\Gate;

use Prime\Component\Base\AbstractUsecase as Base;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $type           = $this->getCall()->getRoute()->getParamOptional('type');
        $pagingContents = $this->getCall()->getRequest()->getQuery()->extract();

        $prime = $this->primeGetComponentFactory()->createPrime($type, $pagingContents);

        return $this->getLayout()->createPrime($type, $prime);
    }
}