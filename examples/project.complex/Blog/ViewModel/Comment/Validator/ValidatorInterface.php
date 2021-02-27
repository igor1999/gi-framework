<?php

namespace Blog\ViewModel\Comment\Validator;

use GI\Validator\Container\Recursive\RecursiveInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

/**
 * Interface ValidatorInterface
 * @package Blog\ViewModel\Comment\Validator
 *
 * @method NotEmptyInterface getText()
 */
interface ValidatorInterface extends RecursiveInterface
{

}