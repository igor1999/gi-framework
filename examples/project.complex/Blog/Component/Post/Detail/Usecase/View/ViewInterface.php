<?php

namespace Blog\Component\Post\Detail\Usecase\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Full\FullInterface as PostDetailInterface;
use Blog\Component\Comment\Feed\FeedInterface as CommentFeedInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\Post\Detail\Usecase\View
 *
 * @method PostDetailInterface getPostDetailComponent()
 * @method ViewInterface setPostDetailComponent(PostDetailInterface $postDetail)
 * @method CommentFeedInterface getCommentFeedComponent()
 * @method ViewInterface setCommentFeedComponent(CommentFeedInterface $commentFeed)
 */
interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}