<?php

namespace Blog\Component\Post\Header\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\ServiceLocator\ServiceLocatorAwareInterface;
use Blog\Component\Post\I18n\I18nAwareInterface;
use Blog\Component\Post\PostRecordAwareInterface;

interface ViewInterface
    extends BaseInterface, ServiceLocatorAwareInterface, I18nAwareInterface, PostRecordAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}