<?php

namespace Blog\Component\Post\Modifying\Creation\ViewModel;

use Blog\ViewModel\Post\ViewModelInterface as BaseInterface;
use GI\Component\Captcha\ImageText\ViewModel\ViewModelInterface as CaptchaViewModelInterface;
use Blog\Component\Post\Modifying\Creation\ViewModel\Validator\ValidatorInterface;
use GI\ViewModel\Validator\ValidatorAwareInterface;

interface ViewModelInterface extends BaseInterface, ValidatorAwareInterface
{
    /**
     * @return CaptchaViewModelInterface
     */
    public function getCaptcha();

    /**
     * @param array $captcha
     * @return self
     * @throws \Exception
     */
    public function setCaptcha($captcha);

    /**
     * @return ValidatorInterface
     */
    public function getValidator();
}