<?php

namespace Blog\RDB\Driver\Main;

use GI\RDB\Driver\AbstractDriver;
use Blog\RDB\Driver\Main\Context\Context;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;
use Blog\RDB\Driver\Main\Context\ContextInterface;

/**
 * Class Driver
 * @package Blog\RDB\Driver
 *
 * @method DBTableInterface getPost()
 * @method DBTableInterface getComment()
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