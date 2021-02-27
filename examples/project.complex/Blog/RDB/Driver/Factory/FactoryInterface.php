<?php

namespace Blog\RDB\Driver\Factory;

use GI\RDB\Driver\Factory\FactoryInterface as BaseInterface;

use Blog\RDB\Driver\Main\DriverInterface as MainDriverInterface;

/**
 * Interface FactoryInterface
 * @package Blog\RDB\Driver\Factory
 *
 * @method MainDriverInterface getMain()
 */
interface FactoryInterface extends BaseInterface
{

}