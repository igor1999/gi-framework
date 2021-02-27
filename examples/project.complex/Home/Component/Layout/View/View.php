<?php

namespace Home\Component\Layout\View;

use Core\Component\Layout\View\AbstractView;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'home-layout';


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