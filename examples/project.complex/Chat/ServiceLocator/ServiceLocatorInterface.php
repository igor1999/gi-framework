<?php

namespace Chat\ServiceLocator;

use Chat\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Chat\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Chat\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Chat\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Chat\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Chat\Identity\IdentityInterface;
use Chat\Socket\Conversation\Result\Factory\FactoryInterface as ConversationResultFactoryInterface;

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

    /**
     * @param string|null $caller
     * @return ConversationResultFactoryInterface
     */
    public function getConversationResultFactory($caller = null);
}