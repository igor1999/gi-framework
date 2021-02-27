<?php

namespace Prime\Component\Menu\I18n;

use GI\I18n\Translator\Glossary\Glossary as Base;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class Glossary extends Base implements GlossaryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Glossary constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->addByClass(self::class);
    }
}