<?php

namespace I18nTest\Component\Factory;

use GI\Component\Factory\Base\AbstractFactory as Base;

use I18nTest\Component\Layout\Layout;
use I18nTest\Component\Message\Message;


use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;


use I18nTest\Component\Layout\LayoutInterface;
use I18nTest\Component\Message\MessageInterface;

/**
 * Class Factory
 * @package I18nTest\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method MessageInterface createMessage()
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
            ->set(Message::class);
    }
}