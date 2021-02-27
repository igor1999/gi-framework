<?php

namespace Prime\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;

use Prime\Component\Layout\View\ViewInterface;
use Prime\Component\Prime\PrimeInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @param string $type
     * @param PrimeInterface $content
     * @return self
     * @throws \Exception
     */
    public function createPrime(string $type, PrimeInterface $content);
}