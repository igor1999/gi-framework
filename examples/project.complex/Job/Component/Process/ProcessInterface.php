<?php

namespace Job\Component\Process;

use Job\Component\Process\View\WidgetInterface;
use GI\Component\Base\ComponentInterface;

interface ProcessInterface extends ComponentInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();

    /**
     * @param string $job
     * @return static
     * @throws \Exception
     */
    public function start(string $job);

    /**
     * @param string $job
     * @return array
     * @throws \Exception
     */
    public function check(string $job);
}