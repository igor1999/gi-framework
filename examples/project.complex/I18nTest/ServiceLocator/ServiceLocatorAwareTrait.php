<?php

namespace I18nTest\ServiceLocator;

use I18nTest\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use I18nTest\Component\Factory\FactoryInterface as ComponentFactoryInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function i18nTestGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    protected function i18nTestGetRouteTree()
    {
        return $this->i18nTestGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function i18nTestGetComponentFactory()
    {
        return $this->i18nTestGetServiceLocator()->getComponentFactory(static::class);
    }
}