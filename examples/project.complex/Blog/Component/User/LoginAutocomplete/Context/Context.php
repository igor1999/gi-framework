<?php

namespace Blog\Component\User\LoginAutocomplete\Context;

use Blog\ServiceLocator\ServiceLocatorIntegralTrait;
use GI\Pattern\Validation\ValidationTrait;
use Blog\Component\User\I18n\I18nAwareTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait, ValidationTrait, I18nAwareTrait;


    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->translate('login');
    }

    /**
     * @return string
     */
    public function getDataName()
    {
        return 'login';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getUri()
    {
        return $this->blogGetRouteTree()->getUserTree()->getAutocomplete()->build();
    }
}