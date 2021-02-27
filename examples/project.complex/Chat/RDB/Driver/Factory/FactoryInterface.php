<?php

namespace Chat\RDB\Driver\Factory;

use GI\RDB\Driver\Factory\FactoryInterface as BaseInterface;

use Chat\RDB\Driver\Main\DriverInterface as MainDriverInterface;

/**
 * Interface FactoryInterface
 * @package Chat\RDB\Driver\Factory
 *
 * @method MainDriverInterface getMain()
 */
interface FactoryInterface extends BaseInterface
{

}