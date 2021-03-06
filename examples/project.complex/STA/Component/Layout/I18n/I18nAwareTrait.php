<?php

namespace STA\Component\Layout\I18n;

trait I18nAwareTrait
{
    /**
     * @param string $text
     * @return string
     */
    public function translate($text)
    {
        return $this->giTranslate(GlossaryInterface::class, Glossary::class, $text);
    }
}