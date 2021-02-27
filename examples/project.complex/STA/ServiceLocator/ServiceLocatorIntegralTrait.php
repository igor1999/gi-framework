<?php

namespace STA\ServiceLocator;

use GI\ServiceLocator\ServiceLocatorAwareTrait as ApplicationServiceLocatorAwareTrait;

trait ServiceLocatorIntegralTrait
{
    use ApplicationServiceLocatorAwareTrait, ServiceLocatorAwareTrait;
}