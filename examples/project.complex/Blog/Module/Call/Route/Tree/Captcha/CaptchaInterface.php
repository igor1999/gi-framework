<?php

namespace Blog\Module\Call\Route\Tree\Captcha;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

interface CaptchaInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getRecaptcha();
}