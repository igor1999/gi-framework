<?php

namespace Home\Component\Factory;

use GI\Component\Factory\Base\AbstractFactory as Base;

use Home\Component\Layout\Layout;
use Home\Component\Menu\Menu;


use Home\ServiceLocator\ServiceLocatorAwareTrait;


use Home\Component\Layout\LayoutInterface;
use Home\Component\Menu\MenuInterface;

/**
 * Class Factory
 * @package Home\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method MenuInterface createMenu()
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

        $this->set(Layout::class)
            ->set(Menu::class);
    }
}