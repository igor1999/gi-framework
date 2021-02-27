<?php

namespace Blog\Component\Comment\Detail\Base\View;

use GI\Component\Base\View\AbstractView as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

abstract class AbstractView extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-comment-detail';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * AbstractView constructor.
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