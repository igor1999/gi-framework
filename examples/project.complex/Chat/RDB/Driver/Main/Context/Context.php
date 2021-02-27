<?php

namespace Chat\RDB\Driver\Main\Context;

use GI\RDB\Driver\Context\MYSQL\Localhost\AbstractLocalhost;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends AbstractLocalhost implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     */
    public function getDatabase()
    {
        return 'chat';
    }
}