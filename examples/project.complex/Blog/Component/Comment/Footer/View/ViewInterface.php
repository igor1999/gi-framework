<?php

namespace Blog\Component\Comment\Footer\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\ServiceLocator\ServiceLocatorAwareInterface;
use Blog\Component\Comment\I18n\I18nAwareInterface;
use Blog\Component\Comment\CommentRecordAwareInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\Comment\Footer\View
 *
 * @method bool isAllowDelete()
 * @method ViewInterface setAllowDelete($allow)
 */
interface ViewInterface
    extends BaseInterface, ServiceLocatorAwareInterface, I18nAwareInterface, CommentRecordAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}