<?php

namespace Prime\Component\Prime\View\Widget;

use GI\Component\Table\View\Widget\AbstractWidget as Base;
use Prime\Component\Prime\View\Widget\Template\Template;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Prime\View\Widget\Template\TemplateInterface;

/**
 * Class Widget
 * @package Prime\Component\Prime\View\Widget
 *
 * @method array getNumbers()
 * @method WidgetInterface setNumbers(array $numbers)
 */
class Widget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'prime-prime-widget';


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