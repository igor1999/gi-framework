<?php

namespace Chat\RDB\Driver\Factory;

use GI\RDB\Driver\Factory\AbstractFactory as Base;

use Chat\RDB\Driver\Main\Driver as MainDriver;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use Chat\RDB\Driver\Main\DriverInterface as MainDriverInterface;

/**
 * Class Factory
 * @package Chat\RDB\Driver\Factory
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