<?php

namespace Job\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use Job\Component\Layout\View\View;
use Job\Component\Layout\I18n\Glossary;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Component\Layout\View\ViewInterface;
use Job\Component\Home\HomeInterface;
use Job\Component\Process\ProcessInterface;
use Job\Component\Layout\I18n\GlossaryInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait;


    const HOME_TITLE    = 'Job login';

    const PROCESS_TITLE = 'Job process';


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Layout constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

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
     * @param HomeInterface $content
     * @return self
     * @throws \Exception
     */
    public function createHome(HomeInterface $content)
    {
        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,static::HOME_TITLE);

        $this->setTitle($title)->setContent($content);

        return $this;
    }

    /**
     * @param ProcessInterface $content
     * @return self
     * @throws \Exception
     */
    public function createProcess(ProcessInterface $content)
    {
        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,static::PROCESS_TITLE);

        $this->setTitle($title)->setContent($content);

        return $this;
    }
}