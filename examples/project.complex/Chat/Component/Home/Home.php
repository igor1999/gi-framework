<?php

namespace Chat\Component\Home;

use GI\Component\Base\AbstractComponent;
use Chat\Component\Home\View\View;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Component\Home\View\ViewInterface;

class Home extends AbstractComponent implements HomeInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Home constructor.
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
        return $this->getView()->setAuth($this->chatGetIdentity()->isAuthenticated())->toString();
    }
}