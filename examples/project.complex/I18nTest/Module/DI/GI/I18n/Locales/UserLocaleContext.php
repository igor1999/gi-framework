<?php

namespace I18nTest\Module\DI\GI\I18n\Locales;

use I18nTest\ServiceLocator\ServiceLocatorIntegralTrait;

class UserLocaleContext implements UserLocaleContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return string
     */
    public function getDefaultLocale()
    {
        return 'en_GB';
    }

    /**
     * @return array
     */
    public function getUsedLocales()
    {
        return ['en_GB', 'fr_FR', 'de_DE', 'es_ES', 'it_IT', 'pt_PT', 'nl_NL', 'pl_PL', 'uk_UA', 'he_IL'];
    }

    /**
     * @return string
     */
    public function getCookieName()
    {
        return 'i18nTestLocale';
    }

    /**
     * @return int
     */
    public function getCookieExpires()
    {
        return 3600 * 24 * 365;
    }
}