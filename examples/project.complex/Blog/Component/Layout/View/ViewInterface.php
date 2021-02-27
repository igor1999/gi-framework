<?php

namespace Blog\Component\Layout\View;

use GI\Component\Layout\View\ViewInterface as BaseInterface;
use Blog\Component\Layout\I18n\I18nAwareInterface;

interface ViewInterface extends BaseInterface, I18nAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}