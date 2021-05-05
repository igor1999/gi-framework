<?php

namespace Blog\Component\User\Statistic\Totally\View;

use GI\Component\Table\View\ViewInterface as BaseInterface;
use Blog\Component\User\I18n\I18nAwareInterface;
use Blog\Component\User\Statistic\Totally\View\Widget\WidgetInterface;

interface ViewInterface extends BaseInterface, I18nAwareInterface
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