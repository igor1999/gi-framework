<?php

namespace Job\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;

use Job\Component\Layout\View\ViewInterface;
use Job\Component\Home\HomeInterface;
use Job\Component\Process\ProcessInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @param HomeInterface $content
     * @return self
     * @throws \Exception
     */
    public function createHome(HomeInterface $content);

    /**
     * @param ProcessInterface $content
     * @return self
     * @throws \Exception
     */
    public function createProcess(ProcessInterface $content);
}