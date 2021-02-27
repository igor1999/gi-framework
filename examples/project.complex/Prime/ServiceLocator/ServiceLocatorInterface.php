<?php

namespace Prime\ServiceLocator;

use Prime\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use Prime\Component\Factory\FactoryInterface as ComponentFactoryInterface;

interface ServiceLocatorInterface
{
    /**
     * @return ServiceLocatorInterface
     */
    public static function getInstance();

    /**
     * @param string|null $caller
     * @return RouteTreeInterface
     */
    public function getRouteTree(string $caller = null);

    /**
     * @param string|null $caller
     * @return ComponentFactoryInterface
     */
    public function getComponentFactory(string $caller = null);
}