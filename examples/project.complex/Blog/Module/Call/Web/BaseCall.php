<?php

namespace Blog\Module\Call\Web;

use Core\Module\Call\Web\AbstractCall;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class BaseCall extends AbstractCall implements BaseCallInterface
{
    use ServiceLocatorAwareTrait;
}