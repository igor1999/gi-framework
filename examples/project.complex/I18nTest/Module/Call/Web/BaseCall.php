<?php

namespace I18nTest\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}