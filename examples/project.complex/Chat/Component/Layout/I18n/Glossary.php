<?php

namespace Chat\Component\Layout\I18n;

use GI\I18n\Translator\Glossary\Glossary as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

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