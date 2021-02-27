<?php

namespace Chat\Component\Conversation\I18n;

interface I18nAwareInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function translate(string $text);
}