<?php

namespace STA\Component\Layout\View;

use Core\Component\Layout\View\ViewInterface as BaseInterface;
use STA\Component\Layout\I18n\I18nAwareInterface;

interface ViewInterface extends BaseInterface, I18nAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}