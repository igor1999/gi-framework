<?php

namespace Prime\Component\Prime;

use GI\Component\Base\ComponentInterface;
use GI\Component\Paging\Base\PagingInterface;
use Prime\Component\Prime\View\ViewInterface;

interface PrimeInterface extends ComponentInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return PagingInterface
     */
    public function getPaging();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}