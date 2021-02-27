<?php

namespace Job\Process\Delay\JobData;

use GI\CLI\Job\Cache\JobData\AbstractJobData;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class JobData extends AbstractJobData implements JobDataInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var int
     */
    private $time = 0;


    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return static
     */
    public function setTime(int $time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @param int $time
     * @return static
     */
    public function addTime(int $time)
    {
        $this->setTime($this->getTime() + $time);

        return $this;
    }
}