<?php

namespace Prime\Component\Factory;

use GI\Component\Factory\Base\FactoryInterface as BaseInterface;

use Prime\Component\Menu\MenuInterface;
use Prime\Component\Layout\LayoutInterface;
use Prime\Component\Prime\PrimeInterface;

/**
 * Interface FactoryInterface
 * @package Prime\Component\Factory
 *
 * @method MenuInterface createMenu()
 * @method LayoutInterface createLayout()
 * @method PrimeInterface createPrime($type, array $pagingContents)
 */
interface FactoryInterface extends BaseInterface
{

}