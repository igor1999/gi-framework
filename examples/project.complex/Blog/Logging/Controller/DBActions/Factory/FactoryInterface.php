<?php

namespace Blog\Logging\Controller\DBActions\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use Blog\Logging\Controller\DBActions\Post\RemovingInterface as PostRemovingInterface;
use Blog\Logging\Controller\DBActions\Comment\RemovingInterface as CommentRemovingInterface;

/**
 * Interface FactoryInterface
 * @package Blog\Logging\Controller\DBActions\Factory
 *
 * @method PostRemovingInterface getPostRemoving()
 * @method CommentRemovingInterface getCommentRemoving()
 */
interface FactoryInterface extends BaseInterface
{

}