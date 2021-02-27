<?php

namespace Blog\Component\Post\Detail\Footerless\View;

use Blog\Component\Post\Detail\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;

interface ViewInterface extends BaseInterface, HeaderAwareInterface, FullBodyAwareInterface
{

}