<?php

namespace Blog\Component\Comment\Modifying\Creation\Gate;

use GI\Component\Base\Gate\AbstractGate;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Gate extends AbstractGate implements GateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @throws \Throwable
     */
    public function save()
    {
        try {
            $postID = $this->getCall()->getRoute()->getParam('postID');

            $data = $this->getCall()->getRequest()->getPost()->extract();

            $component = $this->blogGetComponentFactory()->getCommentFactory()->createCreation($postID);

            $this->getCall()->setResponseToJSON($component->save($data));
        } catch (\Exception $e) {
            $this->handleError($e);
        }
    }
}