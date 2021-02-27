<?php

namespace Job\RDB\ORM\Factory;

use GI\RDB\ORM\Factory\FactoryInterface as BaseInterface;

use Job\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Job\RDB\ORM\User\SetInterface as UserSetInterface;

/**
 * Interface FactoryInterface
 * @package Job\RDB\ORM\Factory
 *
 * @method UserRecordInterface createUserRecord($primaryKey = null)
 * @method UserSetInterface createUserSet()
 */
interface FactoryInterface extends BaseInterface
{

}