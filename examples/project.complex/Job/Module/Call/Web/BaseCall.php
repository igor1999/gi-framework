<?php

namespace Job\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}