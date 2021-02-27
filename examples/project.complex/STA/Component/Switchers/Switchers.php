<?php

namespace STA\Component\Switchers;

use GI\Component\Base\AbstractComponent;
use STA\Component\Switchers\View\Widget;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Component\Switchers\View\WidgetInterface;

class Switchers extends AbstractComponent implements SwitchersInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var WidgetInterface
     */
    private $view;


    /**
     * Switchers constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->toString();
    }
}