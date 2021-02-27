<?php

namespace Core\Component\Layout\I18n;

use GI\I18n\Translator\Glossary\Glossary as Base;

class Glossary extends Base implements GlossaryInterface
{
    /**
     * Glossary constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->addByClass(self::class);
    }
}