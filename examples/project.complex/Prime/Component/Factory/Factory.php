<?php

namespace Prime\Component\Factory;

use GI\Component\Factory\Base\AbstractFactory as Base;

use Prime\Component\Menu\Menu;
use Prime\Component\Layout\Layout;
use Prime\Component\Prime\Prime;

use Prime\Component\Menu\MenuInterface;
use Prime\Component\Layout\LayoutInterface;
use Prime\Component\Prime\PrimeInterface;

/**
 * Class Factory
 * @package Prime\Component\Factory
 *
 * @method MenuInterface createMenu()
 * @method LayoutInterface createLayout()
 * @method PrimeInterface createPrime($type, array $pagingContents)
 */
class Factory extends Base implements FactoryInterface
{
    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->set(Menu::class)
            ->set(Layout::class)
            ->set(Prime::class);
    }
}