<?php

namespace Blog\Module\Call\Web\Container\User\Statistic;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Blog\Module\Call\Web\BaseCall;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Web\BaseCallInterface;

use Blog\Component\User\Statistic\Single\Usecase\Gate\Gate as SingleGate;
use Blog\Component\User\Statistic\Totally\Usecase\Gate\Gate as TotallyGate;

class Statistic extends Base implements StatisticInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createSingle()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getUserTree()->getStatisticTree()->getSingle(),
            function(BaseCallInterface $call)
            {
                (new SingleGate($call))->dispatch();

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createTotally()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getUserTree()->getStatisticTree()->getTotally(),
            function(BaseCallInterface $call)
            {
                (new TotallyGate($call))->dispatch();

                return true;
            }
        );
    }
}