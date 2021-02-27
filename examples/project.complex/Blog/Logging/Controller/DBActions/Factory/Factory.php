<?php

namespace Blog\Logging\Controller\DBActions\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Logging\Controller\DBActions\Post\Removing as PostRemoving;
use Blog\Logging\Controller\DBActions\Comment\Removing as CommentRemoving;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\Logging\Controller\DBActions\Post\RemovingInterface as PostRemovingInterface;
use Blog\Logging\Controller\DBActions\Comment\RemovingInterface as CommentRemovingInterface;

/**
 * Class Factory
 * @package Blog\Logging\Controller\DBActions\Factory
 *
 * @method PostRemovingInterface getPostRemoving()
 * @method CommentRemovingInterface getCommentRemoving()
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
        $this->setCached(true)
            ->setPrefixToGet()
            ->setNamed('PostRemoving',PostRemoving::class)
            ->setNamed('CommentRemoving',CommentRemoving::class);
    }
}