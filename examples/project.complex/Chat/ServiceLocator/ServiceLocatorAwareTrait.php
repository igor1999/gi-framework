<?php

namespace Chat\ServiceLocator;

use Chat\Module\Call\Route\Tree\RootInterface as RouteTreeInterface;
use Chat\Component\Factory\FactoryInterface as ComponentFactoryInterface;
use Chat\RDB\Driver\Factory\FactoryInterface as RDBDriverFactoryInterface;
use Chat\RDB\ORM\Factory\FactoryInterface as RDBORMFactoryInterface;
use Chat\RDB\DAL\Factory\FactoryInterface as RDBDALFactoryInterface;
use Chat\Identity\IdentityInterface;
use Chat\Socket\Conversation\Result\Factory\FactoryInterface as ConversationResultFactoryInterface;

trait ServiceLocatorAwareTrait
{
    /**
     * @return ServiceLocatorInterface
     */
    protected function chatGetServiceLocator()
    {
        return ServiceLocator::getInstance();
    }

    /**
     * @return RouteTreeInterface
     */
    public function chatGetRouteTree()
    {
        return $this->chatGetServiceLocator()->getRouteTree(static::class);
    }

    /**
     * @return ComponentFactoryInterface
     */
    protected function chatGetComponentFactory()
    {
        return $this->chatGetServiceLocator()->getComponentFactory(static::class);
    }

    /**
     * @return RDBDriverFactoryInterface
     */
    protected function chatGetRDBDriverFactory()
    {
        return $this->chatGetServiceLocator()->getRDBDriverFactory(static::class);
    }

    /**
     * @return RDBORMFactoryInterface
     */
    protected function chatGetRDBORMFactory()
    {
        return $this->chatGetServiceLocator()->getRDBORMFactory(static::class);
    }

    /**
     * @return RDBDALFactoryInterface
     */
    protected function chatGetRDBDALFactory()
    {
        return $this->chatGetServiceLocator()->getRDBDALFactory(static::class);
    }

    /**
     * @return IdentityInterface
     */
    protected function chatGetIdentity()
    {
        return $this->chatGetServiceLocator()->getIdentity(static::class);
    }

    /**
     * @return ConversationResultFactoryInterface
     */
    protected function chatGetConversationResultFactory()
    {
        return $this->chatGetServiceLocator()->getConversationResultFactory(static::class);
    }
}