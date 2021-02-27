<?php

namespace Prime\Module;

use GI\Application\Module\Provider\AbstractProvider;
use Prime\Module\Call\Web\Container\Container as CallContainer;
use Prime\Module\DI\DI as DIContainer;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Module\DI\DIInterface as DIContainerInterface;

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