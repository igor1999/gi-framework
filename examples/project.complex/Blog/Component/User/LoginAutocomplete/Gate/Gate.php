<?php

namespace Blog\Component\User\LoginAutocomplete\Gate;

use GI\Component\Autocomplete\Gate\AbstractGate;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Gate extends AbstractGate implements GateInterface
{
    use ServiceLocatorAwareTrait;
}