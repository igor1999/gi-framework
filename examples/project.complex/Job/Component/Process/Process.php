<?php

namespace Job\Component\Process;

use GI\Component\Base\AbstractComponent;
use Job\Component\Process\View\Widget;

use Job\Process\Delay\Delay;
use Job\Process\Delay\DelayInterface;
use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Component\Process\View\WidgetInterface;

class Process extends AbstractComponent implements ProcessInterface
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

    /**
     * @param string $job
     * @return static
     * @throws \Exception
     */
    public function start(string $job)
    {
        if (empty($job)) {
            $this->giThrowIsEmptyException('Job');
        }

        $route = $this->jobGetRouteTree()->getProcessTree()->getExecutionTree()->getStart()->build();

        $commandLine = $this->giGetCLIFactory()->createCommandLine();
        $commandLine->addJob($job, true)->addCurrentSession()->addRoute($route);
        $commandLine->getExecutionProcessor()->startBackgroundProcess();

        return $this;
    }

    /**
     * @param string $job
     * @return array
     * @throws \Exception
     */
    public function check(string $job)
    {
        /** @var DelayInterface $delay */
        $delay = $this->giGetDi(DelayInterface::class, Delay::class,  [$job]);

        return ['done' => $delay->isDone(), 'value' => $delay->getPercentage()];
    }
}