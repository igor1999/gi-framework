<?php

namespace STA\Component\Layout\I18n;

interface I18nAwareInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function translate($text);
}