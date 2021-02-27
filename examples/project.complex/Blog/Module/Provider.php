<?php

namespace Blog\Module;

use GI\Application\Module\Provider\AbstractProvider;
use Blog\Module\Call\Web\Container\Container as CallContainer;
use Blog\Module\DI\DI as DIContainer;
use Blog\Identity\Identity;
use Blog\Component\Post\Feed\Usecase\Usecase as PostFeedUsecase;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\DI\DIInterface as DIContainerInterface;

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

    /**
     * @return string[]
     */
    public function getSessionExchangeClasses()
    {
        return [
            Identity::class,
            PostFeedUsecase::class,
        ];
    }
}
