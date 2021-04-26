<?php

namespace Blog\Component\User\LoginAutocomplete;

use GI\Component\Autocomplete\AbstractAutocomplete;
use Blog\Component\User\LoginAutocomplete\Context\Context;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\User\LoginAutocomplete\Context\ContextInterface;

class LoginAutocomplete extends AbstractAutocomplete implements LoginAutocompleteInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return ContextInterface
     * @throws \Exception
     */
    protected function createContext()
    {
        return $this->giGetDi(ContextInterface::class, Context::class);
    }

    /**
     * @param  string $value
     * @return array[]
     */
    protected function createList(string $value)
    {
        return $this->blogGetRDBDALFactory()->getUserDAL()->autocompleteLogin($value);
    }
}