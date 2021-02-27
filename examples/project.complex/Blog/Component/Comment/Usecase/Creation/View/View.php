<?php

namespace Blog\Component\Comment\Usecase\Creation\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Footerless\FooterlessInterface as PostDetailInterface;
use Blog\Component\Comment\Modifying\Creation\CreationInterface as CommentCreationFormInterface;

/**
 * Class View
 * @package Blog\Component\Comment\Usecase\Creating\View
 *
 * @method PostDetailInterface getPostDetailComponent()
 * @method ViewInterface setPostDetailComponent(PostDetailInterface $post)
 * @method CommentCreationFormInterface getCommentFormComponent()
 * @method ViewInterface setCommentFormComponent(CommentCreationFormInterface $commentForm)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-comment-usecase-creation';


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