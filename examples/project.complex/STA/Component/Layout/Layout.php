<?php

namespace STA\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use STA\Component\Layout\View\View;
use STA\Component\Layout\I18n\Glossary;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Component\Layout\View\ViewInterface;
use STA\Component\Menu\MenuInterface;
use STA\Component\Switchers\SwitchersInterface;
use STA\Component\Layout\I18n\GlossaryInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait;


    const SWITCHERS_TITLE = 'Switchers';


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

        $this->naviMenu = $this->staGetComponentFactory()->createMenu();
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
     * @param SwitchersInterface $content
     * @return self
     * @throws \Exception
     */
    public function createSwitchers(SwitchersInterface $content)
    {
        $this->getNaviMenu()->selectSwitchers();

        $this->setTitle(
            $this->giTranslate(GlossaryInterface::class, Glossary::class,static::SWITCHERS_TITLE)
        )->setContent($content);

        return $this;
    }
}