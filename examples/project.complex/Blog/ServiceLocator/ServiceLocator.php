<?php

namespace Blog\ServiceLocator;

use Blog\Module\Call\Route\Tree\Root as RouteTree;
use Blog\Component\Factory\Factory as ComponentFactory;
use Blog\RDB\Driver\Factory\Factory as RDBDriverFactory;
use Blog\RDB\ORM\Factory\Factory as RDBORMFactory;
use Blog\RDB\DAL\Factory\Factory as RDBDALFactory;
use Blog\Identity\Identity;
use Blog\Email\Factory\Factory as EmailFactory;
use Blog\Logging\Controller\Factory\Factory as LoggingFactory;

use GI\ServiceLocator\ServiceLocatorAwareTrait as ApplicationServiceLocatorAwareTrait;

use Blog\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Blog\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Blog\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Blog\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Blog\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Blog\Identity\IdentityInterface;
use Blog\Email\Factory\FactoryInterface as EmailFactoryInterface;
use Blog\Logging\Controller\Factory\FactoryInterface as LoggingFactoryInterface;

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
     * @var EmailFactoryInterface
     */
    private $emailFactory;

    /**
     * @var LoggingFactoryInterface
     */
    private $loggingFactory;


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
    public function getComponentFactory(string $caller = null)
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
    public function getRDBDriverFactory(string $caller = null)
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
    public function getRDBORMFactory(string $caller = null)
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
    public function getRDBDALFactory(string $caller = null)
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
    public function getIdentity(string $caller = null)
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

    /**
     * @param string|null $caller
     * @return EmailFactoryInterface
     */
    public function getEmailFactory(string $caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(EmailFactoryInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->emailFactory instanceof EmailFactoryInterface)) {
                $this->emailFactory = new EmailFactory();
            }

            $result = $this->emailFactory;
        }

        return $result;
    }

    /**
     * @param string|null $caller
     * @return LoggingFactoryInterface
     */
    public function getLoggingFactory(string $caller = null)
    {
        try {
            $result = $this->giGetServiceLocator()->getDi()->find(LoggingFactoryInterface::class, $caller);
        } catch (\Exception $e) {
            if (!($this->loggingFactory instanceof LoggingFactoryInterface)) {
                $this->loggingFactory = new LoggingFactory();
            }

            $result = $this->loggingFactory;
        }

        return $result;
    }
}