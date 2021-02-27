<?php

namespace Job\Process\Delay\JobData;

use GI\CLI\Job\Cache\JobData\JobDataInterface as BaseInterface;

interface JobDataInterface extends BaseInterface
{
    /**
     * @return int
     */
    public function getTime();

    /**
     * @param int $time
     * @return static
     */
    public function setTime(int $time);

    /**
     * @param int $time
     * @return static
     */
    public function addTime(int $time);
}