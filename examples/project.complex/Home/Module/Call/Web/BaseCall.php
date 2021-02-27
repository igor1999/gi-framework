<?php

namespace Home\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}