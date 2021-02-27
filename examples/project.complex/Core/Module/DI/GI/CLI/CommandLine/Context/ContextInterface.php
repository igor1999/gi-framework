<?php

namespace Core\Module\DI\GI\CLI\CommandLine\Context;

use GI\CLI\CommandLine\Context\ContextInterface as BaseInterface;
use GI\FileSystem\FSO\FSOFile\FSOFileInterface;

interface ContextInterface extends BaseInterface
{
    /**
     * @return FSOFileInterface
     * @throws \Exception
     */
    public function getScript();
}