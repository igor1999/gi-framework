<?php

namespace Blog\Component\Post\Modifying\Edition\ViewModel;

use Blog\ViewModel\Post\AbstractViewModel as Base;
use Blog\Component\Post\Modifying\Edition\ViewModel\Validator\Validator;

use GI\ViewModel\Validator\ValidatorAwareTrait;

use Blog\Component\Post\Modifying\Edition\ViewModel\Validator\ValidatorInterface;

class ViewModel extends Base implements ViewModelInterface
{
    use ValidatorAwareTrait;


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
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator()
    {
        return $this->validator;
    }
}