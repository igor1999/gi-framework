<?php

namespace STA\Module;

use GI\Application\Module\Provider\ProviderInterface as BaseInterface;

use STA\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use STA\Module\DI\DIInterface as DIContainerInterface;

interface ProviderInterface extends BaseInterface
{
    /**
     * @return WebCallContainerInterface
     * @throws \Exception
     */
    public function getWebCallContainer();

    /**
     * @return DIContainerInterface
     */
    public function getDI();
}