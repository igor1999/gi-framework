<?php

namespace Home\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;

use Home\Component\Layout\View\ViewInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return self
     */
    public function createHome();
}