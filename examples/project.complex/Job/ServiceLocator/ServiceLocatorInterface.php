<?php

namespace Job\ServiceLocator;

use Job\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Job\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Job\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Job\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Job\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Job\Identity\IdentityInterface;

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
    public function getRouteTree($caller = null);

    /**
     * @param string|null $caller
     * @return ComponentFactoryInterface
     */
    public function getComponentFactory($caller = null);

    /**
     * @param string|null $caller
     * @return RDBDriverFactoryInterface
     */
    public function getRDBDriverFactory($caller = null);

    /**
     * @param string|null $caller
     * @return RDBORMFactoryInterface
     */
    public function getRDBORMFactory($caller = null);

    /**
     * @param string|null $caller
     * @return RDBDALFactoryInterface
     */
    public function getRDBDALFactory($caller = null);

    /**
     * @param string|null $caller
     * @return IdentityInterface
     */
    public function getIdentity($caller = null);
}