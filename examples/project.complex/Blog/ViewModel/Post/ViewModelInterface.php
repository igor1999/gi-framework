<?php

namespace Blog\ViewModel\Post;

use GI\ViewModel\ViewModelInterface as BaseInterface;

/**
 * Interface ViewModelInterface
 * @package Blog\ViewModel\Post
 *
 * @method getTitleName()
 * @method getTextName()
 */
interface ViewModelInterface extends BaseInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return self
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return self
     */
    public function setText($text);
}