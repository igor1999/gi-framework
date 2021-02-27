<?php

namespace Context;

use GI\RDB\Synchronizing\Context\ContextInterface as BaseInterface;
use GI\FileSystem\FSO\FSOFile\FSOFileInterface;

interface ContextInterface extends BaseInterface
{
    /**
     * @return FSOFileInterface
     * @throws \Exception
     */
    public function getDumpFile();

    /**
     * @return FSOFileInterface
     * @throws \Exception
     */
    public function getResultFile();
}