<?php

namespace Blog\Component\Comment\Detail\Footerless\View;

use Blog\Component\Comment\Detail\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareInterface;

interface ViewInterface extends BaseInterface, HeaderAwareInterface, BodyAwareInterface
{

}