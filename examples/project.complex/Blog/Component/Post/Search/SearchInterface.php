<?php

namespace Blog\Component\Post\Search;

use Blog\Component\Post\Search\View\WidgetInterface;
use GI\Component\Base\ComponentInterface;

interface SearchInterface extends ComponentInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}