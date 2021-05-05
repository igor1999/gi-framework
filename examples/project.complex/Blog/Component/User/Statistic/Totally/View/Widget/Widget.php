<?php

namespace Blog\Component\User\Statistic\Totally\View\Widget;

use GI\Component\Table\View\Widget\AbstractWidget as Base;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Template;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Totally\View\Widget\Template\TemplateInterface;

class Widget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-user-statistic-totally-widget';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var TemplateInterface
     */
    private $template;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
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

    /**
     * @return TemplateInterface
     * @throws \Exception
     */
    protected function getTemplate()
    {
        if (!($this->template instanceof TemplateInterface)) {
            $this->template = $this->giGetDi(TemplateInterface::class, Template::class);
        }

        return $this->template;
    }
}