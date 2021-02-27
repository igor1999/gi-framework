<?php

namespace Job\Component\Process\Gate;

use Job\Component\Base\Gate\AbstractUsecase as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $process = $this->jobGetComponentFactory()->createProcess();

        return $this->getLayout()->createProcess($process);
    }

    /**
     * @return static
     * @throws \Throwable
     */
    public function start()
    {
        try {
            $job = $this->getCall()->getRequest()->getPost()->getOptional('job');

            $process = $this->jobGetComponentFactory()->createProcess();
            $process->start($job);
        } catch (\Exception $exception) {
            $this->handleError($exception);
        }

        return $this;
    }

    /**
     * @return static
     * @throws \Throwable
     */
    public function check()
    {
        try {
            $job = $this->getCall()->getRequest()->getQuery()->getOptional('job');

            $process = $this->jobGetComponentFactory()->createProcess();

            $response = $process->check($job);

            $this->getCall()->setResponseToJSON($response);
        } catch (\Exception $exception) {
            $this->handleError($exception);
        }

        return $this;
    }
}