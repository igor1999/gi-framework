<?php

namespace Blog\Component\Comment\Body\View;

use GI\Component\Base\View\AbstractView as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Comment\CommentRecordAwareTrait;

class View extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait, CommentRecordAwareTrait;


    const CLIENT_CSS = 'blog-comment-body';


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