<?php

namespace Prime\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class DI extends Base implements DIInterface
{
    use ServiceLocatorAwareTrait;
}