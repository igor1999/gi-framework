<?php

namespace Blog\Component\Post\Detail\Full\View;

use Blog\Component\Post\Detail\Base\View\AbstractView as Base;

use Blog\Component\Post\Detail\Base\Part\FooterAwareTrait;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareTrait;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareTrait;

class View extends Base implements ViewInterface
{
    use HeaderAwareTrait, FooterAwareTrait, FullBodyAwareTrait;
}