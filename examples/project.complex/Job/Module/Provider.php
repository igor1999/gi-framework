<?php

namespace Job\Module;

use GI\Application\Module\Provider\AbstractProvider;
use Job\Module\Call\CLI\Container\Container as CLICallContainer;
use Job\Module\Call\Web\Container\Container as WebCallContainer;
use Job\Module\DI\DI as DIContainer;
use Job\Identity\Identity;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Module\Call\CLI\Container\ContainerInterface as CLICallContainerInterface;
use Job\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use Job\Module\DI\DIInterface as DIContainerInterface;

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
