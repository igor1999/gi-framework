<?php

namespace Core\Module\DI\GI\CLI\CommandLine\Context;

use GI\CLI\CommandLine\Context\AbstractContext as Base;

use GI\ServiceLocator\ServiceLocatorAwareTrait;

use Core\Module\LocatorInterface;
use GI\FileSystem\FSO\FSOFile\FSOFileInterface;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return FSOFileInterface
     * @throws \Exception
     */
    public function getScript()
    {
        return $this->giCreateClassDirChildDir(LocatorInterface::class, '')
            ->createParent()
            ->createParent()
            ->createChildFile('_bootstrap/cli/cli.php');
    }
}