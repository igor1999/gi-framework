<?php

namespace Chat\RDB\DAL\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;


use Chat\RDB\DAL\Socket\DALInterface as SocketDALInterface;
use Chat\RDB\DAL\User\DALInterface as UserDALInterface;

/**
 * Interface FactoryInterface
 * @package Chat\RDB\DAL\Factory
 *
 * @method SocketDALInterface getSocketDAL()
 * @method UserDALInterface getUserDAL()
 */
interface FactoryInterface extends BaseInterface
{

}