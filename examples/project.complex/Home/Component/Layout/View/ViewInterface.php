<?php

namespace Home\Component\Layout\View;

use Core\Component\Layout\View\ViewInterface as BaseInterface;

interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}