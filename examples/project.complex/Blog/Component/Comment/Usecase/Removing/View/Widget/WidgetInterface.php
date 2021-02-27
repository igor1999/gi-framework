<?php

namespace Blog\Component\Comment\Usecase\Removing\View\Widget;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id);

    /**
     * @return LayoutInterface
     */
    public function getContainer();

    /**
     * @return ButtonInterface
     */
    public function getDeleteButton();
}