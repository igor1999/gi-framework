<?php

namespace Blog\Component\Post\Search\ViewModel\Filter;

use GI\Filter\Container\Recursive\Recursive;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Filter\Simple\DateTime\Date\DefaultEmptyInterface;

/**
 * Class Filter
 * @package Blog\Component\Post\Search\ViewModel\Filter
 *
 * @method DefaultEmptyInterface getFrom()
 * @method DefaultEmptyInterface getTill()
 */
class Filter extends Recursive implements FilterInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return array
     */
    protected function getContents()
    {
        return [
            'from' => $this->giGetFilterFactory()->createDateEmpty(),
            'till' => $this->giGetFilterFactory()->createDateEmpty()
        ];
    }
}