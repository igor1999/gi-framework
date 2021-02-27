<?php

namespace I18nTest\Module;

use GI\Application\Module\Provider\ProviderInterface as BaseInterface;

use I18nTest\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use I18nTest\Module\DI\DIInterface as DIContainerInterface;

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