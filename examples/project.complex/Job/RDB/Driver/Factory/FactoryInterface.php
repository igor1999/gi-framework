<?php

namespace Job\RDB\Driver\Factory;

use GI\RDB\Driver\Factory\FactoryInterface as BaseInterface;

use Job\RDB\Driver\Main\DriverInterface as MainDriverInterface;

/**
 * Interface FactoryInterface
 * @package Job\RDB\Driver\Factory
 *
 * @method MainDriverInterface getMain()
 */
interface FactoryInterface extends BaseInterface
{

}