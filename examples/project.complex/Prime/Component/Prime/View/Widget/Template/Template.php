<?php

namespace Prime\Component\Prime\View\Widget\Template;

use GI\Component\Table\View\Widget\Template\AbstractTemplate;
use GI\Component\Table\View\Widget\Template\Cell\Header\Number\Number as HeaderNumber;
use GI\Component\Table\View\Widget\Template\Cell\Body\Number\Number as BodyNumber;
use Prime\Component\Prime\View\Widget\Template\Cell\PrimeNumber\Body\Body;
use Prime\Component\Prime\View\Widget\Template\Cell\PrimeNumber\Header\Header;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class Template extends AbstractTemplate implements TemplateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Template constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->set('position', HeaderNumber::class, BodyNumber::class)
            ->set('number',Header::class, Body::class);
    }
}