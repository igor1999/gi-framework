<?php

namespace Job\Process\Delay;

use GI\CLI\Job\JobInterface;

interface DelayInterface extends JobInterface
{
    /**
     * @return int
     * @throws \Exception
     */
    public function getPercentage();
}