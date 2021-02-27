<?php

namespace STA\Component\Factory;

use GI\Component\Factory\Base\AbstractFactory as Base;

use STA\Component\Menu\Menu;
use STA\Component\Layout\Layout;
use STA\Component\Switchers\Switchers;
use STA\Component\Switchers\State\State;


use STA\ServiceLocator\ServiceLocatorAwareTrait;


use STA\Component\Menu\MenuInterface;
use STA\Component\Layout\LayoutInterface;
use STA\Component\Switchers\SwitchersInterface;
use STA\Component\Switchers\State\StateInterface;

/**
 * Class Factory
 * @package STA\Component\Factory
 *
 * @method MenuInterface createMenu()
 * @method LayoutInterface createLayout()
 * @method SwitchersInterface createSwitchers()
 * @method StateInterface createState(array $name = [])
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->set(Menu::class)
            ->set(Layout::class)
            ->set(Switchers::class)
            ->set(State::class);
    }
}