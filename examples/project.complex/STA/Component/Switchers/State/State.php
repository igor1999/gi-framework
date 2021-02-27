<?php

namespace STA\Component\Switchers\State;

use GI\Component\Switcher\Base\AbstractSwitcher;
use STA\Component\Switchers\State\Selection\Selection;
use STA\Component\Switchers\State\View\Widget;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Component\Switchers\State\Selection\SelectionInterface;
use STA\Component\Switchers\State\View\WidgetInterface;

class State extends AbstractSwitcher implements StateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var SelectionInterface
     */
    private $selection;

    /**
     * @var WidgetInterface
     */
    private $view;


    /**
     * State constructor.
     * @param array $name
     * @throws \Exception
     */
    public function __construct(array $name = [])
    {
        parent::__construct($name);

        $this->selection = $this->giGetDi(SelectionInterface::class, Selection::class);

        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);
    }

    /**
     * @return SelectionInterface
     */
    public function getSelection()
    {
        return $this->selection;
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }
}