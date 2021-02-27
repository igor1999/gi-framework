<?php

namespace Prime\Component\Prime\View;

use GI\Component\Base\View\AbstractView as Base;
use Prime\Component\Prime\View\Widget\Widget;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Prime\View\Widget\WidgetInterface;
use GI\Component\Paging\Base\PagingInterface;

/**
 * Class View
 * @package Prime\Component\Prime\View
 *
 * @method PagingInterface getPaging()
 * @method ViewInterface setPaging(PagingInterface $paging)
 */
class View extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'prime-prime-view';


    /**
     * @var WidgetInterface
     */
    private $widget;

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