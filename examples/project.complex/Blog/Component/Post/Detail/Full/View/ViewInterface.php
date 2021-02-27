<?php

namespace Blog\Component\Post\Detail\Full\View;

use Blog\Component\Post\Detail\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;

interface ViewInterface extends BaseInterface, HeaderAwareInterface, FooterAwareInterface, FullBodyAwareInterface
{

}