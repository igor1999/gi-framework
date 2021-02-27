<?php

namespace Blog\Component\Comment\I18n;

interface I18nAwareInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function translate($text);
}