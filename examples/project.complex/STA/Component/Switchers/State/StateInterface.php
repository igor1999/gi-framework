<?php

namespace STA\Component\Switchers\State;

use GI\Component\Switcher\Base\SwitcherInterface;
use STA\Component\Switchers\State\Selection\SelectionInterface;
use STA\Component\Switchers\State\View\WidgetInterface;

interface StateInterface extends SwitcherInterface
{
    /**
     * @return SelectionInterface
     */
    public function getSelection();

    /**
     * @return WidgetInterface
     */
    public function getView();
}