<?php

namespace Chat\RDB\Driver\Main;

use GI\RDB\Driver\AbstractDriver;
use Chat\RDB\Driver\Main\Context\Context;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;
use Chat\RDB\Driver\Main\Context\ContextInterface;

/**
 * Class Driver
 * @package Chat\RDB\Driver\Main
 *
 * @method DBTableInterface getUser()
 * @method DBTableInterface getDemon()
 * @method DBTableInterface getSocket()
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