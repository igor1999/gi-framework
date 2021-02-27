<?php

namespace Blog\ViewModel\Comment;

use GI\ViewModel\ViewModelInterface as BaseInterface;

/**
 * Interface ViewModelInterface
 * @package Blog\ViewModel\Comment
 *
 * @method getTextName()
 */
interface ViewModelInterface extends BaseInterface
{
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