<?php

namespace Home\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use Home\Component\Layout\View\View;
use Home\Component\Layout\I18n\Glossary;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

use Home\Component\Layout\View\ViewInterface;
use Home\Component\Menu\MenuInterface;
use Home\Component\Layout\I18n\GlossaryInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait;


    const HOME_TITLE = 'Home';


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var MenuInterface
     */
    private $naviMenu;


    /**
     * Layout constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->naviMenu = $this->homeGetComponentFactory()->createMenu();
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return MenuInterface
     */
    public function getNaviMenu()
    {
        return $this->naviMenu;
    }

    /**
     * @return self
     */
    public function createHome()
    {
        $this->setTitle(
            $this->giTranslate(GlossaryInterface::class, Glossary::class,static::HOME_TITLE)
        );

        return $this;
    }
}