<?php

namespace Job\RDB\Driver\Main;

use GI\RDB\Driver\AbstractDriver;
use Job\RDB\Driver\Main\Context\Context;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;
use Job\RDB\Driver\Main\Context\ContextInterface;

/**
 * Class Driver
 * @package Job\RDB\Driver\Main
 *
 * @method DBTableInterface getUser()
 */
class Driver extends AbstractDriver implements DriverInterface
{
    use ServiceLocatorAwareTrait;


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