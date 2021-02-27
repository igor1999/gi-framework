<?php

namespace STA\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}