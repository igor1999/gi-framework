<?php

namespace Chat\RDB\Driver\Main;

use GI\RDB\Driver\DriverInterface as BaseInterface;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;

/**
 * Interface DriverInterface
 * @package Chat\RDB\Driver\Main
 *
 * @method DBTableInterface getUser()
 * @method DBTableInterface getDemon()
 * @method DBTableInterface getSocket()
 */
interface DriverInterface extends BaseInterface
{

}