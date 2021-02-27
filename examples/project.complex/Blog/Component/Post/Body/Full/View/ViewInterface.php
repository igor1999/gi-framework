<?php

namespace Blog\Component\Post\Body\Full\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\PostRecordAwareInterface;

interface ViewInterface extends BaseInterface, PostRecordAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}