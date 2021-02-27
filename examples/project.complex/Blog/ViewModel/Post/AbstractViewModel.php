<?php

namespace Blog\ViewModel\Post;

use GI\ViewModel\AbstractViewModel as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

/**
 * Class AbstractViewModel
 * @package Blog\ViewModel\Post
 *
 * @method getTitleName()
 * @method getTextName()
 */
abstract class AbstractViewModel extends Base implements ViewModelInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var string
     */
    private $title = '';

    /**
     * @var string
     */
    private $text = '';


    /**
     * @extract
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @hydrate
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

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