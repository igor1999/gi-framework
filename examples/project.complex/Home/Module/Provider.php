<?php

namespace Home\Module;

use GI\Application\Module\Provider\AbstractProvider;
use Home\Module\Call\Web\Container\Container as CallContainer;
use Home\Module\DI\DI as DIContainer;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

use Home\Module\DI\DIInterface as DIContainerInterface;

class Provider extends AbstractProvider implements ProviderInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return CallContainer
     */
    public function getWebCallContainer()
    {
        return new CallContainer();
    }

    /**
     * @return DIContainerInterface
     */
    public function getDI()
    {
        return new DIContainer();
    }
}