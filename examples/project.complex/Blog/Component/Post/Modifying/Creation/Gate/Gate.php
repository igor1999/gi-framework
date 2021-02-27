<?php

namespace Blog\Component\Post\Modifying\Creation\Gate;

use Blog\Component\Base\Gate\AbstractUsecase as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return LayoutInterface
     */
    protected function createUsecase()
    {
        $component = $this->blogGetComponentFactory()->getPostFactory()->createCreation();

        return $this->getLayout()->createNewPost($component);
    }

    /**
     * save new comment
     * @throws \Throwable
     */
    public function save()
    {
        try {
            $data = $this->getCall()->getRequest()->getPost()->extract();

            $component = $this->blogGetComponentFactory()->getPostFactory()->createCreation();

            $this->getCall()->setResponseToJSON($component->save($data));
        } catch (\Throwable $throwable) {
            $this->handleError($throwable);
        }
    }
}