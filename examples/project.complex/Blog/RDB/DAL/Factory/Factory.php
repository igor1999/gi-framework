<?php

namespace Blog\RDB\DAL\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\RDB\DAL\Post\DAL as PostDAL;
use Blog\RDB\DAL\Comment\DAL as CommentDAL;
use Blog\RDB\DAL\User\DAL as UserDAL;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\RDB\DAL\Post\DALInterface as PostDALInterface;
use Blog\RDB\DAL\Comment\DALInterface as CommentDALInterface;
use Blog\RDB\DAL\User\DALInterface as UserDALInterface;

/**
 * Class Factory
 * @package Blog\RDB\DAL\Factory
 *
 * @method PostDALInterface getPostDAL()
 * @method CommentDALInterface getCommentDAL()
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
            ->setNamed('PostDAL', PostDAL::class)
            ->setNamed('CommentDAL', CommentDAL::class)
            ->setNamed('UserDAL', UserDAL::class);
    }
}