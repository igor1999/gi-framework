<?php

namespace Blog\Component\Post\Feed\Usecase\Gate;

use Blog\Component\Base\Gate\AbstractUsecase as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $conditions = $this->getCall()->getRequest()->getQuery()->extract();

        $feed = $this->blogGetComponentFactory()->getPostFactory()->createFeedUsecase($conditions);

        return $this->getLayout()->createPostFeed($feed);
    }
}