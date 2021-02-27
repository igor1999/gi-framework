<?php

namespace STA\Component\Factory;

use GI\Component\Factory\Base\FactoryInterface as BaseInterface;

use STA\Component\Menu\MenuInterface;
use STA\Component\Layout\LayoutInterface;
use STA\Component\Switchers\SwitchersInterface;
use STA\Component\Switchers\State\StateInterface;

/**
 * Interface FactoryInterface
 * @package STA\Component\Factory
 *
 * @method MenuInterface createMenu()
 * @method LayoutInterface createLayout()
 * @method SwitchersInterface createSwitchers()
 * @method StateInterface createState(array $name = [])
 */
interface FactoryInterface extends BaseInterface
{

}