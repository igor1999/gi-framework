<?php

namespace Prime\Module;

use GI\Application\Module\Provider\ProviderInterface as BaseInterface;

use Prime\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use Prime\Module\DI\DIInterface as DIContainerInterface;

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