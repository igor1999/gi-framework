<?php

namespace Blog\Component\Post\Detail\Usecase\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Full\FullInterface as PostDetailInterface;
use Blog\Component\Comment\Feed\FeedInterface as CommentFeedInterface;

/**
 * Class View
 * @package Blog\Component\Post\Detail\Usecase\View
 *
 * @method PostDetailInterface getPostDetailComponent()
 * @method ViewInterface setPostDetailComponent(PostDetailInterface $postDetail)
 * @method CommentFeedInterface getCommentFeedComponent()
 * @method ViewInterface setCommentFeedComponent(CommentFeedInterface $commentFeed)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-post-detail-usecase';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * View constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }
}