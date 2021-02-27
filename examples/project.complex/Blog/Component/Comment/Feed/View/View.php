<?php

namespace Blog\Component\Comment\Feed\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Comment\Detail\Full\FullInterface as DetailInterface;

class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-comment-feed';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var DetailInterface[]
     */
    private $entries = [];


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

    /**
     * @return DetailInterface[]
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @param DetailInterface[] $entries
     * @return self
     */
    public function setEntries(array $entries)
    {
        $this->entries = $entries;

        return $this;
    }
}