<?php

namespace Job\ServiceLocator;

use Job\Module\Call\Route\Tree\Root as RouteTree;
use Job\Component\Factory\Factory as ComponentFactory;
use Job\RDB\Driver\Factory\Factory as RDBDriverFactory;
use Job\RDB\ORM\Factory\Factory as RDBORMFactory;
use Job\RDB\DAL\Factory\Factory as RDBDALFactory;
use Job\Identity\Identity;

use GI\ServiceLocator\ServiceLocatorAwareTrait as ApplicationServiceLocatorAwareTrait;

use Job\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Job\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Job\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Job\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Job\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Job\Identity\IdentityInterface;

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
     * @var RDBDriverFactoryInterface
     */
    private $driverFactory;

    /**
     * @var RDBORMFactoryInterface
     */
    private $ormFactory;

    /**
     * @var RDBDALFactoryInterface
     */
    private $dalFactory;

    /**
     * @var IdentityInterface
     */
    private $identity;


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
    public function getRouteTree($caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(RouteTreeInterface::class, $caller);
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
    public function getComponentFactory($caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(ComponentFactoryInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->componentFactory instanceof ComponentFactoryInterface)) {
                $this->componentFactory = new ComponentFactory();
            }

            $result = $this->componentFactory;
        }

        return $result;
    }

    /**
     * @param string|null $caller
     * @return RDBDriverFactoryInterface
     */
    public function getRDBDriverFactory($caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(RDBDriverFactoryInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->driverFactory instanceof RDBDriverFactoryInterface)) {
                $this->driverFactory = new RDBDriverFactory();
            }

            $result = $this->driverFactory;
        }

        return $result;
    }

    /**
     * @param string|null $caller
     * @return RDBORMFactoryInterface
     */
    public function getRDBORMFactory($caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(RDBORMFactoryInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->ormFactory instanceof RDBORMFactoryInterface)) {
                $this->ormFactory = new RDBORMFactory();
            }

            $result = $this->ormFactory;
        }

        return $result;
    }

    /**
     * @param string|null $caller
     * @return RDBDALFactoryInterface
     */
    public function getRDBDALFactory($caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(RDBDALFactoryInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->dalFactory instanceof RDBDALFactoryInterface)) {
                $this->dalFactory = new RDBDALFactory();
            }

            $result = $this->dalFactory;
        }

        return $result;
    }

    /**
     * @param string|null $caller
     * @return IdentityInterface
     */
    public function getIdentity($caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(IdentityInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->identity instanceof IdentityInterface)) {
                $this->identity = new Identity();
            }

            $result = $this->identity;
        }

        return $result;
    }
}