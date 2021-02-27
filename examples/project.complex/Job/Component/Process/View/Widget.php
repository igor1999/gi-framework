<?php

namespace Job\Component\Process\View;

use GI\Component\Base\View\Widget\AbstractWidget;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\State\Progress\ProgressInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait, ContentsTrait;


    const CLIENT_CSS = 'job-process';

    const CLIENT_JS  = self::CLIENT_CSS;


    const SERVER_DATA_START = 'start-url';

    const SERVER_DATA_CHECK = 'check-url';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ResourceRendererInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function build()
    {
        $this->createCsrf();

        $this->getServerDataList()
            ->set(static::SERVER_DATA_START, $this->jobGetRouteTree()->getProcessTree()->getStart()->build())
            ->set(static::SERVER_DATA_CHECK, $this->jobGetRouteTree()->getProcessTree()->getCheck()->build());

        $this->container->build(2, 1)
            ->set(0, 0, $this->progressBar)
            ->set(1, 0, $this->startButton);

        return $this;
    }

    /**
     * @render
     * @gi-id container
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createContainer()
    {
        $this->container = $this->giGetDOMFactory()->createLayout();

        return $this->container;
    }

    /**
     * @gi-id progress-bar
     * @return ProgressInterface
     * @throws \Exception
     */
    protected function createProgressBar()
    {
        $this->progressBar = $this->giGetDOMFactory()->createProgress();

        $this->progressBar->setMax(100)->setValue(0);

        return $this->progressBar;
    }

    /**
     * @gi-id start-button
     * @return ButtonInterface
     */
    protected function createStartButton()
    {
        $this->startButton = $this->giGetDOMFactory()->getInputFactory()->createButton([], 'start!');

        return $this->startButton;
    }
}