<?php

namespace Job\Component\Layout\View;

use Core\Component\Layout\View\AbstractView;

use Job\ServiceLocator\ServiceLocatorAwareTrait;
use Job\Component\Layout\I18n\I18nAwareTrait;

class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'job-layout';


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