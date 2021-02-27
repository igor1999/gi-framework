<?php

namespace Blog\Component\Post\Modifying\Edition\ViewModel;

use Blog\ViewModel\Post\ViewModelInterface as BaseInterface;
use Blog\Component\Post\Modifying\Edition\ViewModel\Validator\ValidatorInterface;
use GI\ViewModel\Validator\ValidatorAwareInterface;

interface ViewModelInterface extends BaseInterface, ValidatorAwareInterface
{
    /**
     * @return ValidatorInterface
     */
    public function getValidator();
}