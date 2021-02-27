<?php

namespace Job\ServiceLocator;

use Job\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Job\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Job\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Job\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Job\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Job\Identity\IdentityInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function jobGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    public function jobGetRouteTree()
    {
        return $this->jobGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function jobGetComponentFactory()
    {
        return $this->jobGetServiceLocator()->getComponentFactory(static::class);
    }

    /**
     * @return RDBDriverFactoryInterface
     */
    protected function jobGetRDBDriverFactory()
    {
        return $this->jobGetServiceLocator()->getRDBDriverFactory(static::class);
    }

    /**
     * @return RDBORMFactoryInterface
     */
    protected function jobGetRDBORMFactory()
    {
        return $this->jobGetServiceLocator()->getRDBORMFactory(static::class);
    }

    /**
     * @return RDBDALFactoryInterface
     */
    protected function jobGetRDBDALFactory()
    {
        return $this->jobGetServiceLocator()->getRDBDALFactory(static::class);
    }

    /**
     * @return IdentityInterface
     */
    protected function jobGetIdentity()
    {
        return $this->jobGetServiceLocator()->getIdentity(static::class);
    }
}