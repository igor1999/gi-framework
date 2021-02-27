<?php

namespace Blog\Component\Post\Modifying\Edition\Gate;

use GI\RDB\ORM\Exception\NotFound as ORMNotFoundException;
use GI\Exception\IsEmpty as IsEmptyException;

use Blog\Component\Base\Gate\AbstractUsecase as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;
use GI\Application\Call\Web\CallInterface as WebCallInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Modifying\Edition\EditionInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    const POST_NOT_FOUND_MESSAGE = 'Post not found';


    /**
     * Gate constructor.
     * @param WebCallInterface $call
     * @throws \Exception
     */
    public function __construct(WebCallInterface $call)
    {
        parent::__construct($call);

        $body = $this->getLayout()->createNotFound(static::POST_NOT_FOUND_MESSAGE);
        $response = $this->giGetResponseFactory()->createStatus404($body);

        $this->getCommonErrors()->create(
            ORMNotFoundException::class, $response, PostRecordInterface::class, true
        )->create(
            IsEmptyException::class, $response, EditionInterface::class, true
        );
    }

    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $id        = $this->getCall()->getRoute()->getParam('id');
        $component = $this->blogGetComponentFactory()->getPostFactory()->createEdition($id);

        return $this->getLayout()->createPostEdit($component);
    }

    /**
     * save new post
     * @throws \Throwable
     */
    public function save()
    {
        try {
            $id   = $this->getCall()->getRoute()->getParam('id');
            $data = $this->getCall()->getRequest()->getPost()->extract();

            $component = $this->blogGetComponentFactory()->getPostFactory()->createEdition($id);

            $this->getCall()->setResponseToJSON($component->save($data));
        } catch (\Throwable $throwable) {
            $this->handleError($throwable);
        }
    }

    /**
     * @throws \Throwable
     */
    public function delete()
    {
        try {
            $id   = $this->getCall()->getRoute()->getParam('id');

            $component = $this->blogGetComponentFactory()->getPostFactory()->createEdition($id);

            $this->getCall()->setResponseToSimple($component->delete());
        } catch (\Throwable $throwable) {
            $this->handleError($throwable);
        }
    }
}