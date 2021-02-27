<?php

namespace Blog\Module\DI\GI\Component\Captcha\ImageText;

use Blog\ServiceLocator\ServiceLocatorIntegralTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getRecaptchaURI()
    {
        return $this->blogGetRouteTree()->getCaptchaTree()->getRecaptcha()->build();
    }
}