<?php

namespace Blog\Component\Comment\Body\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Comment\CommentRecordAwareInterface;

interface ViewInterface extends BaseInterface, CommentRecordAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}