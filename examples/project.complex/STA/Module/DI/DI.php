<?php

namespace STA\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

class DI extends Base implements DIInterface
{
    use ServiceLocatorAwareTrait;
}