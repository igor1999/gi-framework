<?php

namespace Job\RDB\DAL\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Job\RDB\DAL\User\DAL as UserDAL;


use Job\ServiceLocator\ServiceLocatorAwareTrait;


use Job\RDB\DAL\User\DALInterface as UserDALInterface;

/**
 * Class Factory
 * @package Job\RDB\DAL\Factory
 *
 * @method UserDALInterface getUserDAL()
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
        $this->setPrefixToGet()
            ->setCached(true)
            ->setNamed('UserDAL', UserDAL::class);
    }
}