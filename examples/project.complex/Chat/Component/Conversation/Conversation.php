<?php

namespace Chat\Component\Conversation;

use GI\Component\Base\AbstractComponent;
use Chat\Component\Conversation\View\Widget;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Component\Conversation\View\WidgetInterface;

class Conversation extends AbstractComponent implements ConversationInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var WidgetInterface
     */
    private $view;


    /**
     * Conversation constructor.
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