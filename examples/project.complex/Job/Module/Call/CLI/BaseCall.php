<?php

namespace Job\Module\Call\CLI;

use Core\Module\Call\CLI\AbstractCall;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}