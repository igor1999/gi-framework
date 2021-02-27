<?php

namespace Blog\RDB\Driver\Factory;

use GI\RDB\Driver\Factory\AbstractFactory as Base;

use Blog\RDB\Driver\Main\Driver as MainDriver;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\RDB\Driver\Main\DriverInterface as MainDriverInterface;

/**
 * Class Factory
 * @package Blog\RDB\Driver\Factory
 *
 * @method MainDriverInterface getMain()
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('Main', MainDriver::class);
    }
}