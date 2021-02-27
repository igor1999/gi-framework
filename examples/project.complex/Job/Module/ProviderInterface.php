<?php

namespace Job\Module;

use GI\Application\Module\Provider\ProviderInterface as BaseInterface;
use Job\Module\Call\CLI\Container\ContainerInterface as CLICallContainerInterface;
use Job\Module\Call\Web\Container\ContainerInterface as WebCallContainerInterface;
use Job\Module\DI\DIInterface as DIContainerInterface;

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