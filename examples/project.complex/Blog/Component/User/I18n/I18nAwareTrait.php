<?php

namespace Blog\Component\User\I18n;

trait I18nAwareTrait
{
    /**
     * @param string $text
     * @return string
     */
    public function translate(string $text)
    {
        return $this->giTranslate(GlossaryInterface::class, Glossary::class, $text);
    }
}