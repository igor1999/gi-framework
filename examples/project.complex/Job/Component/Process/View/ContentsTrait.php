<?php

namespace Job\Component\Process\View;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\State\Progress\ProgressInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

trait ContentsTrait
{
    /**
     * @var LayoutInterface
     */
    private $container;

    /**
     * @var ProgressInterface
     */
    private $progressBar;

    /**
     * @var ButtonInterface
     */
    private $startButton;


    /**
     * @return LayoutInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return ProgressInterface
     */
    public function getProgressBar()
    {
        return $this->progressBar;
    }

    /**
     * @return ButtonInterface
     */
    public function getStartButton()
    {
        return $this->startButton;
    }
}