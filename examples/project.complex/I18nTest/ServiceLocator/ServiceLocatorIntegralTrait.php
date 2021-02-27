<?php

namespace I18nTest\ServiceLocator;

use GI\ServiceLocator\ServiceLocatorAwareTrait as ApplicationServiceLocatorAwareTrait;

trait ServiceLocatorIntegralTrait
{
    use ApplicationServiceLocatorAwareTrait, ServiceLocatorAwareTrait;
}