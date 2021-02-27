<?php

namespace Blog\ViewModel\Comment;

use GI\ViewModel\AbstractViewModel as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

/**
 * Class AbstractViewModel
 * @package Blog\ViewModel\Comment
 *
 * @method getTextName()
 */
abstract class AbstractViewModel extends Base implements ViewModelInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var string
     */
    private $text = '';


    /**
     * @extract
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @hydrate
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}