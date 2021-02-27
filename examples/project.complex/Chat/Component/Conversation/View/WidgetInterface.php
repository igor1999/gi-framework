<?php

namespace Chat\Component\Conversation\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @return LayoutInterface
     */
    public function getContainer();

    /**
     * @return DivInterface
     */
    public function getBoard();

    /**
     * @return DivInterface
     */
    public function getMessageContainer();

    /**
     * @return TextAreaInterface
     */
    public function getTextbox();

    /**
     * @return ButtonInterface
     */
    public function getSendButton();
}