<?php

namespace Blog\Component\Post\Body\Short;

use Blog\Component\Post\Body\Full\BodyInterface as BaseInterface;
use Blog\Component\Post\Body\Short\View\ViewInterface;

interface BodyInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();
}