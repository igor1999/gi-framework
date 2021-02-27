<?php

namespace Job\RDB\Driver\Main;

use GI\RDB\Driver\DriverInterface as BaseInterface;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;

/**
 * Interface DriverInterface
 * @package Job\RDB\Driver\Main
 *
 * @method DBTableInterface getUser()
 */
interface DriverInterface extends BaseInterface
{

}