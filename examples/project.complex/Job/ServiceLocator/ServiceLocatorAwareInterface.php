<?php

namespace Job\ServiceLocator;

use Job\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;

interface ServiceLocatorAwareInterface
{
    /**
     * @return RouteTreeInterface
     */
    public function jobGetRouteTree();
}