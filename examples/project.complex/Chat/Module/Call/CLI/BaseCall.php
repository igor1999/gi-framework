<?php

namespace Chat\Module\Call\CLI;

use Core\Module\Call\CLI\AbstractCall;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}