<?php

namespace Blog\Component\Post\Detail\Short;

use Blog\Component\Post\Detail\Base\DetailInterface;
use Blog\Component\Post\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Post\Detail\Base\Part\ShortBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;

interface ShortInterface extends DetailInterface, HeaderAwareInterface, ShortBodyAwareInterface, FooterAwareInterface
{

}