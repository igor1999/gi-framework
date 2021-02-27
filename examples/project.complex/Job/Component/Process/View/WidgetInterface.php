<?php

namespace Job\Component\Process\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\State\Progress\ProgressInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @return LayoutInterface
     */
    public function getContainer();

    /**
     * @return ProgressInterface
     */
    public function getProgressBar();

    /**
     * @return ButtonInterface
     */
    public function getStartButton();
}