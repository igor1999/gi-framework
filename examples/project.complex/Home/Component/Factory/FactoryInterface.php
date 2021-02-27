<?php

namespace Home\Component\Factory;

use GI\Component\Factory\Base\FactoryInterface as BaseInterface;

use Home\Component\Layout\LayoutInterface;
use Home\Component\Menu\MenuInterface;

/**
 * Interface FactoryInterface
 * @package Home\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method MenuInterface createMenu()
 */
interface FactoryInterface extends BaseInterface
{

}