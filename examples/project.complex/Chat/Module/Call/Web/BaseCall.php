<?php

namespace Chat\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}