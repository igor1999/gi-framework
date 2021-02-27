<?php

namespace Chat\Module;

use GI\Application\Module\Provider\ProviderInterface as BaseInterface;
use Chat\Module\Call\CLI\Container\ContainerInterface as CLICallContainerInterface;
use Chat\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use Chat\Module\DI\DIInterface as DIContainerInterface;

interface ProviderInterface extends BaseInterface
{
    /**
     * @return WebCallContainerInterface
     */
    public function getWebCallContainer();

    /**
     * @return CLICallContainerInterface
     */
    public function getCLICallContainer();

    /**
     * @return DIContainerInterface
     */
    public function getDI();
}