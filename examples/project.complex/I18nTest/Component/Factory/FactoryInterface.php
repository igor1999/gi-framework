<?php

namespace I18nTest\Component\Factory;

use GI\Component\Factory\Base\FactoryInterface as BaseInterface;

use I18nTest\Component\Layout\LayoutInterface;
use I18nTest\Component\Message\MessageInterface;

/**
 * Interface FactoryInterface
 * @package I18nTest\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method MessageInterface createMessage()
 */
interface FactoryInterface extends BaseInterface
{

}