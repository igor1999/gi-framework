<?php

namespace Blog\Component\Post\Modifying\Creation\ViewModel;

use Blog\ViewModel\Post\AbstractViewModel as Base;
use GI\Component\Captcha\ImageText\ViewModel\ViewModel as CaptchaViewModel;
use Blog\Component\Post\Modifying\Creation\ViewModel\Validator\Validator;

use GI\ViewModel\Validator\ValidatorAwareTrait;

use GI\Component\Captcha\ImageText\ViewModel\ViewModelInterface as CaptchaViewModelInterface;
use Blog\Component\Post\Modifying\Creation\ViewModel\Validator\ValidatorInterface;

class ViewModel extends Base implements ViewModelInterface
{
    use ValidatorAwareTrait;


    /**
     * @var CaptchaViewModelInterface
     */
    private $captcha;

    /**
     * @var ValidatorInterface
     */
    private $validator;


    /**
     * ViewModel constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->validator = $this->giGetDi(ValidatorInterface::class, Validator::class);

        $this->captcha = $this->giGetDi(CaptchaViewModelInterface::class, CaptchaViewModel::class);
        $this->captcha->setViewModelParent($this)->setValidatorToParent();
    }

    /**
     * @extract
     * @return CaptchaViewModelInterface
     */
    public function getCaptcha()
    {
        return $this->captcha;
    }

    /**
     * @hydrate
     * @param array $captcha
     * @return self
     * @throws \Exception
     */
    public function setCaptcha($captcha)
    {
        if (!is_array($captcha)) {
            $this->giThrowInvalidTypeException('Captcha data', '', 'Array');
        }

        $this->getCaptcha()->hydrate($captcha);

        return $this;
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator()
    {
        return $this->validator;
    }
}