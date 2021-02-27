<?php

namespace STA\Module;

use GI\Application\Module\Provider\AbstractProvider;
use STA\Module\Call\Web\Container\Container as CallContainer;
use STA\Module\DI\DI as DIContainer;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Module\DI\DIInterface as DIContainerInterface;

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