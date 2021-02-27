<?php

namespace STA\ServiceLocator;

use STA\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use STA\Component\Factory\FactoryInterface as ComponentFactoryInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function staGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    protected function staGetRouteTree()
    {
        return $this->staGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function staGetComponentFactory()
    {
        return $this->staGetServiceLocator()->getComponentFactory(static::class);
    }
}