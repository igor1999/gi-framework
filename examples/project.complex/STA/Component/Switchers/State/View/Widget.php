<?php

namespace STA\Component\Switchers\State\View;

use GI\Component\Switcher\Base\View\Widget as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

class Widget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'sta-switchers-state';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * Widget constructor.
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
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }
}