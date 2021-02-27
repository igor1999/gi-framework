<?php

namespace Prime\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}