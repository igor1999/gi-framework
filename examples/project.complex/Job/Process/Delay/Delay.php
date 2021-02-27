<?php

namespace Job\Process\Delay;

use GI\CLI\Job\AbstractJob;
use Job\Process\Delay\JobData\JobData;
use Job\Process\Delay\Context\Context;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Process\Delay\JobData\JobDataInterface;
use Job\Process\Delay\Context\ContextInterface;

class Delay extends AbstractJob implements DelayInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ContextInterface
     */
    private $context;


    /**
     * @return ContextInterface
     * @throws \Exception
     */
    protected function getContext()
    {
        if (!($this->context instanceof ContextInterface)) {
            $this->context = $this->giGetDi(ContextInterface::class, Context::class);
        }

        return $this->context;
    }

    /**
     * @return JobDataInterface
     * @throws \Exception
     */
    protected function getDataContainer()
    {
        /** @var JobDataInterface $container */
        $container = parent::getDataContainer();

        return $container;
    }

    /**
     * @return JobDataInterface
     */
    protected function createDataContainer()
    {
        try {
            $result = $this->giGetDi(JobDataInterface::class, JobData::class);
        } catch (\Exception $exception) {
            $result = new JobData();
        }

        return $result;
    }

    /**
     * @return static
     * @throws \Exception
     */
    protected function start()
    {
        $interval = $this->getContext()->getInterval();
        $total    = $this->getContext()->getTimeTotal();

        $data = $this->getDataContainer();
        $data->addTime($interval);

        usleep($interval * 1000000);

        if ($data->getTime() < $total) {
            $this->saveAndRestart();
        } else {
            $data->setDone(true);
            $this->save();
        }

        return $this;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function getPercentage()
    {
        $time  = $this->getDataContainer()->getTime();
        $total = $this->getContext()->getTimeTotal();

        return floor(($time * 100) / $total);
    }
}