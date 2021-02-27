<?php

namespace Job\RDB\DAL\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;


use Job\RDB\DAL\User\DALInterface as UserDALInterface;

/**
 * Interface FactoryInterface
 * @package Job\RDB\DAL\Factory
 *
 * @method UserDALInterface getUserDAL()
 */
interface FactoryInterface extends BaseInterface
{

}