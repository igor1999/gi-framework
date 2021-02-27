<?php

namespace Context;

use GI\ServiceLocator\ServiceLocatorAwareTrait;

use GI\FileSystem\FSO\FSOFile\FSOFileInterface;

class Context implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return FSOFileInterface
     * @throws \Exception
     */
    public function getDumpFile()
    {
        return $this->giCreateClassDirChildDir(self::class, '')
            ->createParent()
            ->createChildFile('sources/dump.xml');
    }

    /**
     * @return FSOFileInterface
     * @throws \Exception
     */
    public function getResultFile()
    {
        return $this->giCreateClassDirChildDir(self::class, '')
            ->createParent()
            ->createChildFile('sources/result.xml');
    }
}