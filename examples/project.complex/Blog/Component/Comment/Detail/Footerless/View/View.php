<?php

namespace Blog\Component\Comment\Detail\Footerless\View;

use Blog\Component\Comment\Detail\Base\View\AbstractView as Base;

use Blog\Component\Comment\Detail\Base\Part\BodyAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareTrait;

class View extends Base implements ViewInterface
{
    use HeaderAwareTrait, BodyAwareTrait;
}