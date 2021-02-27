<?php

namespace Job\ServiceLocator;

use GI\ServiceLocator\ServiceLocatorAwareTrait as ApplicationServiceLocatorAwareTrait;

trait ServiceLocatorIntegralTrait
{
    use ApplicationServiceLocatorAwareTrait, ServiceLocatorAwareTrait;
}