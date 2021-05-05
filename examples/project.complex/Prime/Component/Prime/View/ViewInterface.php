<?php

namespace Prime\Component\Prime\View;

use GI\Component\Table\View\ViewInterface as BaseInterface;
use GI\Component\Paging\Base\PagingInterface;
use Prime\Component\Prime\View\Widget\WidgetInterface;

/**
 * Interface ViewInterface
 * @package Prime\Component\Prime\View
 *
 * @method PagingInterface getPaging()
 * @method ViewInterface setPaging(PagingInterface $paging)
 */
interface ViewInterface extends BaseInterface
{
    /**
     * @return WidgetInterface
     */
    public function getWidget();

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}