<?php

namespace Blog\RDB\Driver\Main;

use GI\RDB\Driver\DriverInterface as BaseInterface;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;

/**
 * Interface DriverInterface
 * @package Blog\RDB\Driver
 *
 * @method DBTableInterface getPost()
 * @method DBTableInterface getComment()
 * @method DBTableInterface getUser()
 */
interface DriverInterface extends BaseInterface
{

}