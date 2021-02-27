<?php

namespace Blog\Component\Post\Feed\Set\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Short\ShortInterface as DetailInterface;

class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-post-feed-set';


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