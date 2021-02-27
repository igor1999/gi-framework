<?php

namespace Prime\Component\Prime\Context;

use Prime\ServiceLocator\ServiceLocatorIntegralTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return int
     */
    public function getEntriesTotal()
    {
        return 200;
    }
}