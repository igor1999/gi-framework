<?php

namespace STA\Component\Switchers;

use GI\Component\Base\ComponentInterface;
use STA\Component\Switchers\View\WidgetInterface;

interface SwitchersInterface extends ComponentInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}