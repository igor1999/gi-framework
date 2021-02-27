<?php

namespace Blog\Component\Post\Detail\Short\View;

use Blog\Component\Post\Detail\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Post\Detail\Base\Part\ShortBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;

interface ViewInterface extends BaseInterface, HeaderAwareInterface, FooterAwareInterface, ShortBodyAwareInterface
{

}