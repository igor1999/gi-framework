<?php

namespace Job\RDB\Driver\Factory;

use GI\RDB\Driver\Factory\AbstractFactory as Base;

use Job\RDB\Driver\Main\Driver as MainDriver;


use Job\ServiceLocator\ServiceLocatorAwareTrait;


use Job\RDB\Driver\Main\DriverInterface as MainDriverInterface;

/**
 * Class Factory
 * @package Job\RDB\Driver\Factory
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