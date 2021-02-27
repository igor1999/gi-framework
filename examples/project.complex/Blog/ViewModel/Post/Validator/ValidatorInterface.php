<?php

namespace Blog\ViewModel\Post\Validator;

use GI\Validator\Container\Recursive\RecursiveInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

/**
 * Interface ValidatorInterface
 * @package Blog\ViewModel\Post\Validator
 *
 * @method NotEmptyInterface getTitle()
 * @method NotEmptyInterface getText()
 */
interface ValidatorInterface extends RecursiveInterface
{

}