<?php

namespace Blog\Component\User\LoginAutocomplete\Gate;

use GI\Component\Autocomplete\Gate\AbstractGate;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\LoginAutocomplete\LoginAutocompleteInterface;

class Gate extends AbstractGate implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LoginAutocompleteInterface
     */
    protected function getComponent()
    {
        return $this->blogGetComponentFactory()->createLoginAutocomplete();
    }
}