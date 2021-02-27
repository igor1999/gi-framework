<?php

namespace Blog\Component\Post\Detail\Footerless\View;

use Blog\Component\Post\Detail\Base\View\AbstractView as Base;

use Blog\Component\Post\Detail\Base\Part\FullBodyAwareTrait;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareTrait;

class View extends Base implements ViewInterface
{
    use HeaderAwareTrait, FullBodyAwareTrait;
}