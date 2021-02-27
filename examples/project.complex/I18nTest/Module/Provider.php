<?php

namespace I18nTest\Module;

use GI\Application\Module\Provider\AbstractProvider;
use I18nTest\Module\Call\Web\Container\Container as CallContainer;
use I18nTest\Module\DI\DI as DIContainer;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Module\Call\Web\Container\ContainerInterface as CallContainerInterface;
use I18nTest\Module\DI\DIInterface as DIContainerInterface;

class Provider extends AbstractProvider implements ProviderInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return CallContainerInterface
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