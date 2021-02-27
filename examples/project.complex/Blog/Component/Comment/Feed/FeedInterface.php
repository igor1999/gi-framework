<?php

namespace Blog\Component\Comment\Feed;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Comment\Feed\View\ViewInterface;

interface FeedInterface extends ComponentInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}