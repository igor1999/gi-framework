<?php

namespace Chat\Component\Conversation\View;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

trait ContentsTrait
{
    /**
     * @var LayoutInterface
     */
    private $container;

    /**
     * @var DivInterface
     */
    private $board;

    /**
     * @var DivInterface
     */
    private $messageContainer;

    /**
     * @var TextAreaInterface
     */
    private $textbox;

    /**
     * @var ButtonInterface
     */
    private $sendButton;


    /**
     * @return LayoutInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return DivInterface
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @return DivInterface
     */
    public function getMessageContainer()
    {
        return $this->messageContainer;
    }

    /**
     * @return TextAreaInterface
     */
    public function getTextbox()
    {
        return $this->textbox;
    }

    /**
     * @return ButtonInterface
     */
    public function getSendButton()
    {
        return $this->sendButton;
    }
}