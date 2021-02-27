<?php

namespace Blog\Module\DI\GI\Component\Captcha\ImageText;

use GI\Component\Captcha\ImageText\Context\ContextInterface as BaseInterface;

interface ContextInterface extends BaseInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function getRecaptchaURI();
}