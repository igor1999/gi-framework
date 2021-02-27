<?php

namespace I18nTest\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use I18nTest\Component\Layout\View\View;
use I18nTest\Component\Layout\I18n\Glossary;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Component\Layout\View\ViewInterface;
use GI\Component\Locales\LocalesInterface;
use I18nTest\Component\Message\MessageInterface;
use I18nTest\Component\Layout\I18n\GlossaryInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait;


    const MESSAGE_TITLE = 'I18n test';


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var LocalesInterface
     */
    private $locales;


    /**
     * Layout constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->locales = $this->giGetComponentFactory()->createLocales();
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return LocalesInterface
     */
    protected function getLocales()
    {
        return $this->locales;
    }

    /**
     * @param MessageInterface $content
     * @return self
     */
    public function createMessage(MessageInterface $content)
    {
        $this->setTitle(
                $this->giTranslate(GlossaryInterface::class, Glossary::class,static::MESSAGE_TITLE)
            )
            ->setContent($content);

        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $this->getView()->setLocales($this->getLocales());

        return parent::toString();
    }
}