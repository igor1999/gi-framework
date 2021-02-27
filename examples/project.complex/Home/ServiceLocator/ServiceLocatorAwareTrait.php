<?php

namespace Home\ServiceLocator;

use Home\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use Home\Component\Factory\FactoryInterface as ComponentFactoryInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function homeGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    protected function homeGetRouteTree()
    {
        return $this->homeGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function homeGetComponentFactory()
    {
        return $this->homeGetServiceLocator()->getComponentFactory(static::class);
    }
}