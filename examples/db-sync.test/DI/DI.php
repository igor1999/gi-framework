<?php

namespace DI;

use GI\DI\DI as DIContainer;

use GI\RDB\Driver\DriverInterface;
use GI\RDB\Synchronizing\AbstractSynchronizing;
use RDB\Driver\Driver;

use GI\RDB\Synchronizing\Context\ContextInterface;
use Context\Context;

class DI extends DIContainer implements DIInterface
{
    /**
     * DI constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->create(DriverInterface::class,AbstractSynchronizing::class,Driver::class)
            ->create(ContextInterface::class,AbstractSynchronizing::class,Context::class);
    }
}