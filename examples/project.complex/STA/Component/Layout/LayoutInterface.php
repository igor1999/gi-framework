<?php

namespace STA\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;

use STA\Component\Layout\View\ViewInterface;
use STA\Component\Switchers\SwitchersInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @param SwitchersInterface $content
     * @return self
     * @throws \Exception
     */
    public function createSwitchers(SwitchersInterface $content);
}