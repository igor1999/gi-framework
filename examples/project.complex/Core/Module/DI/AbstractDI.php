<?php

namespace Core\Module\DI;

use GI\DI\DI as Base;

use GI\CLI\CommandLine\Context\ContextInterface as ExecutionContextInterface;
use GI\CLI\CommandLine\CommandLine;
use Core\Module\DI\GI\CLI\CommandLine\Context\Context as ExecutionContext;

abstract class AbstractDI extends Base implements DIInterface
{
    /**
     * AbstractDI constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->create(
            ExecutionContextInterface::class,
            CommandLine::class,
            ExecutionContext::class,
            true
        );
    }
}