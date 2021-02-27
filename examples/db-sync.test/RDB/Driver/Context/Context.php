<?php

namespace RDB\Driver\Context;

use GI\RDB\Driver\Context\MYSQL\Localhost\AbstractLocalhost;

class Context extends AbstractLocalhost implements ContextInterface
{
    /**
     * @return string
     */
    public function getDatabase()
    {
        return 'db_sync';
    }
}