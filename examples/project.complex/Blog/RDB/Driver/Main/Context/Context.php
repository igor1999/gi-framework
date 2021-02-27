<?php

namespace Blog\RDB\Driver\Main\Context;

use GI\RDB\Driver\Context\MYSQL\Localhost\AbstractLocalhost;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends AbstractLocalhost implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     */
    public function getDatabase()
    {
        return 'blog';
    }
}