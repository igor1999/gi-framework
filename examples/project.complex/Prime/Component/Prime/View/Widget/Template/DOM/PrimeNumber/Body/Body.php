<?php

namespace Prime\Component\Prime\View\Widget\Template\DOM\PrimeNumber\Body;

use GI\DOM\HTML\Element\Table\Cell\TD\TD;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class Body extends TD implements BodyInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Body constructor.
     * @param int $number
     * @throws \Exception
     */
    public function __construct(int $number)
    {
        parent::__construct((string)$number);
    }
}