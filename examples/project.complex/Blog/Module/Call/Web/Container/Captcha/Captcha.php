<?php

namespace Blog\Module\Call\Web\Container\Captcha;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Blog\Module\Call\Web\BaseCall;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Web\BaseCallInterface;

use GI\Component\Captcha\ImageText\Gate\Gate as CaptchaImageTextGate;

class Captcha extends Base implements CaptchaInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createRecaptcha()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getCaptchaTree()->getRecaptcha(),
            function(BaseCallInterface $call)
            {
                (new CaptchaImageTextGate($call))->getRecaptchaContents();

                return true;
            }
        );
    }
}