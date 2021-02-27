<?php

namespace Blog\ServiceLocator;

use Blog\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;

interface ServiceLocatorAwareInterface
{
    /**
     * @return RouteTreeInterface
     */
    public function blogGetRouteTree();
}