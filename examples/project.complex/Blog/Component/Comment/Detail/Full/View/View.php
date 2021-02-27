<?php

namespace Blog\Component\Comment\Detail\Full\View;

use Blog\Component\Comment\Detail\Base\View\AbstractView as Base;

use Blog\Component\Comment\Detail\Base\Part\FooterAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareTrait;

class View extends Base implements ViewInterface
{
    use HeaderAwareTrait, FooterAwareTrait, BodyAwareTrait;
}