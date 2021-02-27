<?php

namespace Blog\Component\Post\Body\Full\View;

use GI\Component\Base\View\AbstractView as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\PostRecordAwareTrait;

class View extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait, PostRecordAwareTrait;


    const CLIENT_CSS = 'blog-post-body-full';


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