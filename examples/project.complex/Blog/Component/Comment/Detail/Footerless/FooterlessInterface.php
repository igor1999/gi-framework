<?php

namespace Blog\Component\Comment\Detail\Footerless;

use Blog\Component\Comment\Detail\Base\DetailInterface;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareInterface;

interface FooterlessInterface extends DetailInterface, HeaderAwareInterface, BodyAwareInterface
{

}