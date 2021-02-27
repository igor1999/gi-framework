<?php

namespace Blog\Component\Comment\Detail\Full\View;

use Blog\Component\Comment\Detail\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Comment\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareInterface;

interface ViewInterface extends BaseInterface, HeaderAwareInterface, FooterAwareInterface, BodyAwareInterface
{

}