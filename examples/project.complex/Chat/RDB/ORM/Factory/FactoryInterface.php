<?php

namespace Chat\RDB\ORM\Factory;

use GI\RDB\ORM\Factory\FactoryInterface as BaseInterface;

use Chat\RDB\ORM\Demon\RecordInterface as DemonRecordInterface;
use Chat\RDB\ORM\Demon\SetInterface as DemonSetInterface;
use Chat\RDB\ORM\Socket\RecordInterface as SocketRecordInterface;
use Chat\RDB\ORM\Socket\SetInterface as SocketSetInterface;
use Chat\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Chat\RDB\ORM\User\SetInterface as UserSetInterface;

/**
 * Interface FactoryInterface
 * @package Chat\RDB\ORM\Factory
 *
 * @method DemonRecordInterface createDemonRecord($primaryKey = null)
 * @method DemonSetInterface createDemonSet()
 * @method SocketRecordInterface createSocketRecord($primaryKey = null)
 * @method SocketSetInterface createSocketSet()
 * @method UserRecordInterface createUserRecord($primaryKey = null)
 * @method UserSetInterface createUserSet()
 */
interface FactoryInterface extends BaseInterface
{

}