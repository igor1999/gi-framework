<?php

namespace Blog\Component\User\Statistic\Totally\Table\View;

use GI\Component\Table\View\AbstractWidget;
use Blog\Component\User\Statistic\Totally\Table\View\TableHeader\TableHeader;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Totally\Table\View\TableHeader\TableHeaderInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-user-statistic-totally-table';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var TableHeaderInterface
     */
    private $headerModel;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );

        $this->headerModel = $this->giGetDi(TableHeaderInterface::class, TableHeader::class);
    }

    /**
     * @return ResourceRendererInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return TableHeaderInterface
     */
    protected function getHeaderModel()
    {
        return $this->headerModel;
    }
}