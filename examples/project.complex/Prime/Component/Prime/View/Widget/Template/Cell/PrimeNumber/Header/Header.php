<?php

namespace Prime\Component\Prime\View\Widget\Template\Cell\PrimeNumber\Header;

use GI\DOM\HTML\Element\Table\Cell\TH\TH;
use Prime\Component\Prime\I18n\Glossary;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Prime\I18n\GlossaryInterface;

class Header extends TH implements HeaderInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Header constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $numberTitle = $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Number');

        parent::__construct($numberTitle);
    }
}