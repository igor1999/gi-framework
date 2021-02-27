<?php

namespace Blog\Component\Post\Footer\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\ServiceLocator\ServiceLocatorAwareInterface;
use Blog\Component\Post\I18n\I18nAwareInterface;
use Blog\Component\Post\PostRecordAwareInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\Post\Footer\View
 *
 * @method bool isAllowEdit()
 * @method ViewInterface setAllowEdit(bool $allow)
 * @method bool isAllowAddComment()
 * @method ViewInterface setAllowAddComment(bool $allow)
 */
interface ViewInterface
    extends BaseInterface, ServiceLocatorAwareInterface, I18nAwareInterface, PostRecordAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}