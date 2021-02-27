<?php

namespace Blog\Component\Comment\Usecase\Creation\Gate;

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
        $postID = $this->getCall()->getRoute()->getParam('postID');

        $component = $this->blogGetComponentFactory()->getCommentFactory()->createUsecaseCreation($postID);

        return $this->getLayout()->createNewComment($component);
    }
}