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

    /**
     * @param string|null $caller
     * @return RDBDriverFactoryInterface
     */
    public function getRDBDriverFactory(string $caller = null);

    /**
     * @param string|null $caller
     * @return RDBORMFactoryInterface
     */
    public function getRDBORMFactory(string $caller = null);

    /**
     * @param string|null $caller
     * @return RDBDALFactoryInterface
     */
    public function getRDBDALFactory(string $caller = null);

    /**
     * @param string|null $caller
     * @return IdentityInterface
     */
    public function getIdentity(string $caller = null);

    /**
     * @param string|null $caller
     * @return EmailFactoryInterface
     */
    public function getEmailFactory(string $caller = null);

    /**
     * @param string|null $caller
     * @return LoggingFactoryInterface
     */
    public function getLoggingFactory(string $caller = null);
}