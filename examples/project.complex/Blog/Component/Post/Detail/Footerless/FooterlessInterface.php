<?php

namespace Blog\Component\Post\Detail\Footerless;

use Blog\Component\Post\Detail\Base\DetailInterface;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;

interface FooterlessInterface extends DetailInterface, HeaderAwareInterface, FullBodyAwareInterface
{

}