<?php

namespace STA\ServiceLocator;

use STA\Module\Call\Route\Tree\Tree as RouteTree;
use STA\Component\Factory\Factory as ComponentFactory;

use GI\ServiceLocator\ServiceLocatorAwareTrait as ApplicationServiceLocatorAwareTrait;

use STA\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use STA\Component\Factory\FactoryInterface as ComponentFactoryInterface;

class ServiceLocator implements ServiceLocatorInterface
{
    use ApplicationServiceLocatorAwareTrait;


    /**
     * @var ServiceLocatorInterface
     */
    private static $singleton;

    /**
     * @var RouteTreeInterface
     */
    private $routeTree;

    /**
     * @var ComponentFactoryInterface
     */
    private $componentFactory;


    /**
     * @return ServiceLocatorInterface
     */
    public static function getInstance()
    {
        if (!(self::$singleton instanceof ServiceLocatorInterface)) {
            self::$singleton = new self();
        }

        return self::$singleton;
    }

    /**
     * @param string|null $caller
     * @return RouteTreeInterface
     */
    public function getRouteTree(string $caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(
                RouteTreeInterface::class, $caller
            );
        } catch (\Exception $e) {
            if (!($this->routeTree instanceof RouteTreeInterface)) {
                $this->routeTree = new RouteTree();
            }

            $result = $this->routeTree;
        }

        return $result;
    }

    /**
     * @param string|null $caller
     * @return ComponentFactoryInterface
     */
    public function getComponentFactory(string $caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(
                ComponentFactoryInterface::class, $caller
            );
        } catch (\Exception $e) {
            if (!($this->componentFactory instanceof ComponentFactoryInterface)) {
                $this->componentFactory = new ComponentFactory();
            }

            $result = $this->componentFactory;
        }

        return $result;
    }
}