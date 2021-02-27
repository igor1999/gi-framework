<?php

namespace Blog\ViewModel\User\Validator;

use GI\Validator\Container\Recursive\RecursiveInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

/**
 * Interface ValidatorInterface
 * @package Blog\ViewModel\User\Validator
 *
 * @method NotEmptyInterface getLogin()
 * @method NotEmptyInterface getEmail()
 */
interface ValidatorInterface extends RecursiveInterface
{

}