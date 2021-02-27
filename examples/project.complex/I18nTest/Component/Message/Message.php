<?php

namespace I18nTest\Component\Message;

use GI\Component\Base\AbstractComponent;
use I18nTest\Component\Message\View\View;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Component\Message\View\ViewInterface;

class Message extends AbstractComponent implements MessageInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Message constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);
    }

    /**
     * @return ViewInterface
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
        $sounding = $this->giCreateSounding()->getTargetLocaleSounding();

        return $this->getView()->setSounding($sounding)->toString();
    }
}