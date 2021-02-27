<?php

namespace Prime\ServiceLocator;

use Prime\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use Prime\Component\Factory\FactoryInterface as ComponentFactoryInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function primeGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    protected function primeGetRouteTree()
    {
        return $this->primeGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function primeGetComponentFactory()
    {
        return $this->primeGetServiceLocator()->getComponentFactory(static::class);
    }
}