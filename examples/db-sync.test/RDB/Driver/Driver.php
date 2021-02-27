<?php

namespace RDB\Driver;

use RDB\Driver\Context\Context;

use GI\RDB\Driver\AbstractDriver;

use RDB\Driver\Context\ContextInterface;

class Driver extends AbstractDriver implements DriverInterface
{
    /**
     * @var ContextInterface
     */
    private $context;


    /**
     * @return ContextInterface
     */
    protected function getContext()
    {
        return $this->context;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function createContext()
    {
        $this->context = $this->giGetDi(ContextInterface::class, Context::class);

        return $this;
    }


}