<?php

namespace Blog\Component\Post\Body\Short\View;

use Blog\Component\Post\Body\Full\View\ViewInterface as BaseInterface;
use Blog\ServiceLocator\ServiceLocatorAwareInterface;
use Blog\Component\Post\I18n\I18nAwareInterface;

interface ViewInterface extends BaseInterface, ServiceLocatorAwareInterface, I18nAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();

    /**
     * @return int
     */
    public function getLength();
}