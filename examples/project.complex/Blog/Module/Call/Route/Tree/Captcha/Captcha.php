<?php

namespace Blog\Module\Call\Route\Tree\Captcha;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

class Captcha extends Base implements CaptchaInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->blogGetRouteTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/captcha';
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getRecaptcha()
    {
        return $this->createUriPathWithMethodPost('/recaptcha');
    }
}