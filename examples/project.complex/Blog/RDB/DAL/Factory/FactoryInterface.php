<?php

namespace Blog\RDB\DAL\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;


use Blog\RDB\DAL\Post\DALInterface as PostDALInterface;
use Blog\RDB\DAL\Comment\DALInterface as CommentDALInterface;
use Blog\RDB\DAL\User\DALInterface as UserDALInterface;

/**
 * Interface FactoryInterface
 * @package Blog\RDB\DAL\Factory
 *
 * @method PostDALInterface getPostDAL()
 * @method CommentDALInterface getCommentDAL()
 * @method UserDALInterface getUserDAL()
 */
interface FactoryInterface extends BaseInterface
{

}