<?php

namespace Job\RDB\ORM\Factory;

use GI\RDB\ORM\Factory\AbstractFactory as Base;

use Job\RDB\ORM\User\Record as UserRecord;
use Job\RDB\ORM\User\Set as UserSet;


use Job\ServiceLocator\ServiceLocatorAwareTrait;


use Job\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Job\RDB\ORM\User\SetInterface as UserSetInterface;

/**
 * Class Factory
 * @package Job\RDB\ORM\Factory
 *
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

        $this->setNamed('UserRecord', UserRecord::class)
            ->setNamed('UserSet', UserSet::class);
    }
}