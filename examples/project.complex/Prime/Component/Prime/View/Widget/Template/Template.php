<?php

namespace Prime\Component\Prime\View\Widget\Template;

use GI\Component\Table\View\Widget\Template\Collection\AbstractCollection;
use GI\Component\Table\View\Widget\DOM\Header\Number\Number as HeaderNumber;
use GI\Component\Table\View\Widget\DOM\Body\Number\Number as BodyNumber;
use Prime\Component\Prime\View\Widget\DOM\PrimeNumber\Body\Body;
use Prime\Component\Prime\View\Widget\DOM\PrimeNumber\Header\Header;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class Template extends AbstractCollection implements TemplateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Template constructor.
     */
    public function __construct()
    {
        $this->set('position', HeaderNumber::class, BodyNumber::class)
            ->set('number',Header::class, Body::class);
    }
}