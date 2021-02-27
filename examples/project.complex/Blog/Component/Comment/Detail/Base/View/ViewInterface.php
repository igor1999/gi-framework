<?php

namespace Blog\Component\Comment\Detail\Base\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;

interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}