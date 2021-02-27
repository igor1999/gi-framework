<?php

namespace Chat\Module;

use GI\Application\Module\Provider\AbstractProvider;
use Chat\Module\Call\CLI\Container\Container as CLICallContainer;
use Chat\Module\Call\Web\Container\Container as WebCallContainer;
use Chat\Module\DI\DI as DIContainer;
use Chat\Identity\Identity;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Module\Call\CLI\Container\ContainerInterface as CLICallContainerInterface;
use Chat\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use Chat\Module\DI\DIInterface as DIContainerInterface;

class Provider extends AbstractProvider implements ProviderInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return WebCallContainerInterface
     */
    public function getWebCallContainer()
    {
        return new WebCallContainer();
    }

    /**
     * @return CLICallContainerInterface
     */
    public function getCLICallContainer()
    {
        return new CLICallContainer();
    }

    /**
     * @return DIContainerInterface
     */
    public function getDI()
    {
        return new DIContainer();
    }

    /**
     * @return string[]
     */
    public function getSessionExchangeClasses()
    {
        return [
            Identity::class,
        ];
    }
}
