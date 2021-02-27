<?php

namespace Blog\Component\Post\Detail\Base\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;

interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}