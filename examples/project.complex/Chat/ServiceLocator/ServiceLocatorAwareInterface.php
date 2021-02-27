<?php

namespace Chat\ServiceLocator;

use Chat\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;

interface ServiceLocatorAwareInterface
{
    /**
     * @return RouteTreeInterface
     */
    public function chatGetRouteTree();
}