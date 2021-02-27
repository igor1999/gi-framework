<?php

namespace Job\Component\Home;

use GI\Component\Base\AbstractComponent;
use Job\Component\Home\View\View;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Component\Home\View\ViewInterface;

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
        return $this->getView()->setAuth($this->jobGetIdentity()->isAuthenticated())->toString();
    }
}