<?php

namespace Blog\Component\Post\Search\ViewModel\Filter;

use GI\Filter\Container\Recursive\RecursiveInterface;
use GI\Filter\Simple\DateTime\Date\DefaultEmptyInterface;

/**
 * Interface FilterInterface
 * @package Blog\Component\Post\Search\ViewModel\Filter
 *
 * @method DefaultEmptyInterface getFrom()
 * @method DefaultEmptyInterface getTill()
 */
interface FilterInterface extends RecursiveInterface
{

}