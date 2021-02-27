<?php

namespace Home\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

class DI extends Base implements DIInterface
{
    use ServiceLocatorAwareTrait;
}