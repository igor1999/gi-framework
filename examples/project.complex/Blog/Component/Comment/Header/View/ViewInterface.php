<?php

namespace Blog\Component\Comment\Header\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\ServiceLocator\ServiceLocatorAwareInterface;
use Blog\Component\Comment\I18n\I18nAwareInterface;
use Blog\Component\Comment\CommentRecordAwareInterface;

interface ViewInterface
    extends BaseInterface, ServiceLocatorAwareInterface, I18nAwareInterface, CommentRecordAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}