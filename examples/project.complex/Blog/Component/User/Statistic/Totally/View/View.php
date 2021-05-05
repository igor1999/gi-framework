<?php

namespace Blog\Component\User\Statistic\Totally\View;

use GI\Component\Table\View\AbstractView;
use Blog\Component\User\Statistic\Totally\View\Widget\Widget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\User\I18n\I18nAwareTrait;
use Blog\Component\User\Statistic\Totally\View\Widget\WidgetInterface;

class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-user-statistic-totally';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var WidgetInterface
     */
    private $widget;


    /**
     * View constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->widget = $this->giGetDi(WidgetInterface::class, Widget::class);

        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return WidgetInterface
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }
}