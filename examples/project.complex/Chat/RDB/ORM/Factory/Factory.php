<?php

namespace Chat\RDB\ORM\Factory;

use GI\RDB\ORM\Factory\AbstractFactory as Base;

use Chat\RDB\ORM\Demon\Record as DemonRecord;
use Chat\RDB\ORM\Demon\Set as DemonSet;
use Chat\RDB\ORM\Socket\Record as SocketRecord;
use Chat\RDB\ORM\Socket\Set as SocketSet;
use Chat\RDB\ORM\User\Record as UserRecord;
use Chat\RDB\ORM\User\Set as UserSet;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use Chat\RDB\ORM\Demon\RecordInterface as DemonRecordInterface;
use Chat\RDB\ORM\Demon\SetInterface as DemonSetInterface;
use Chat\RDB\ORM\Socket\RecordInterface as SocketRecordInterface;
use Chat\RDB\ORM\Socket\SetInterface as SocketSetInterface;
use Chat\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Chat\RDB\ORM\User\SetInterface as UserSetInterface;

/**
 * Class Factory
 * @package Chat\RDB\ORM\Factory
 *
 * @method DemonRecordInterface createDemonRecord($primaryKey = null)
 * @method DemonSetInterface createDemonSet()
 * @method SocketRecordInterface createSocketRecord($primaryKey = null)
 * @method SocketSetInterface createSocketSet()
 * @method UserRecordInterface createUserRecord($primaryKey = null)
 * @method UserSetInterface createUserSet()
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('DemonRecord', DemonRecord::class)
            ->setNamed('DemonSet', DemonSet::class)
            ->setNamed('SocketRecord', SocketRecord::class)
            ->setNamed('SocketSet', SocketSet::class)
            ->setNamed('UserRecord', UserRecord::class)
            ->setNamed('UserSet', UserSet::class);
    }
}