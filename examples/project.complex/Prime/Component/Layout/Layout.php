<?php

namespace Prime\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use Prime\Component\Layout\View\View;
use Prime\Component\Layout\I18n\Glossary;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Layout\View\ViewInterface;
use Prime\Component\Menu\MenuInterface;
use Prime\Component\Prime\PrimeInterface;
use Prime\Component\Layout\I18n\GlossaryInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait;


    const PRIME_TITLE = 'Prime numbers';


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

        $this->naviMenu = $this->primeGetComponentFactory()->createMenu();
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
     * @param string $type
     * @param PrimeInterface $content
     * @return self
     * @throws \Exception
     */
    public function createPrime(string $type, PrimeInterface $content)
    {
        $this->getNaviMenu()->select($type);

        $this->setTitle(
            $this->giTranslate(GlossaryInterface::class, Glossary::class,static::PRIME_TITLE)
        )->setContent($content);

        return $this;
    }
}