<?php

namespace Chat\RDB\DAL\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Chat\RDB\DAL\Socket\DAL as SocketDAL;
use Chat\RDB\DAL\User\DAL as UserDAL;


use Chat\ServiceLocator\ServiceLocatorAwareTrait;


use Chat\RDB\DAL\Socket\DALInterface as SocketDALInterface;
use Chat\RDB\DAL\User\DALInterface as UserDALInterface;

/**
 * Class Factory
 * @package Chat\RDB\DAL\Factory
 *
 * @method SocketDALInterface getSocketDAL()
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
            ->setNamed('SocketDAL', SocketDAL::class)
            ->setNamed('UserDAL', UserDAL::class);
    }
}