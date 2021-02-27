<?php

namespace Blog\ServiceLocator;

use Blog\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Blog\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Blog\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Blog\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Blog\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Blog\Identity\IdentityInterface;
use Blog\Email\Factory\FactoryInterface as EmailFactoryInterface;
use Blog\Logging\Controller\Factory\FactoryInterface as LoggingFactoryInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function blogGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    public function blogGetRouteTree()
    {
        return $this->blogGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function blogGetComponentFactory()
    {
        return $this->blogGetServiceLocator()->getComponentFactory(static::class);
    }

    /**
     * @return RDBDriverFactoryInterface
     */
    protected function blogGetRDBDriverFactory()
    {
        return $this->blogGetServiceLocator()->getRDBDriverFactory(static::class);
    }

    /**
     * @return RDBORMFactoryInterface
     */
    protected function blogGetRDBORMFactory()
    {
        return $this->blogGetServiceLocator()->getRDBORMFactory(static::class);
    }

    /**
     * @return RDBDALFactoryInterface
     */
    protected function blogGetRDBDALFactory()
    {
        return $this->blogGetServiceLocator()->getRDBDALFactory(static::class);
    }

    /**
     * @return IdentityInterface
     */
    protected function blogGetIdentity()
    {
        return $this->blogGetServiceLocator()->getIdentity(static::class);
    }

    /**
     * @return EmailFactoryInterface
     */
    protected function blogGetEmailFactory()
    {
        return $this->blogGetServiceLocator()->getEmailFactory(static::class);
    }

    /**
     * @return LoggingFactoryInterface
     */
    protected function blogGetLoggingFactory()
    {
        return $this->blogGetServiceLocator()->getLoggingFactory(static::class);
    }
}