<?php

namespace Blog\Component\Comment\Usecase\Removing\Gate;

use GI\RDB\ORM\Exception\NotFound as ORMNotFoundException;

use Blog\Component\Base\Gate\AbstractUsecase as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;
use GI\Application\Call\Web\CallInterface as WebCallInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

class Gate extends Base implements GateInterface
{
    use ServiceLocatorAwareTrait;


    const COMMENT_NOT_FOUND_MESSAGE = 'Comment not found';


    /**
     * Gate constructor.
     * @param WebCallInterface $call
     * @throws \Exception
     */
    public function __construct(WebCallInterface $call)
    {
        parent::__construct($call);

        $body = $this->getLayout()->createNotFound(static::COMMENT_NOT_FOUND_MESSAGE);
        $response = $this->giGetResponseFactory()->createStatus404($body);
        $this->getCommonErrors()->create(
            ORMNotFoundException::class, $response, CommentRecordInterface::class, true
        );
    }

    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $id = $this->getCall()->getRoute()->getParam('id');

        $component = $this->blogGetComponentFactory()->getCommentFactory()->createUsecaseRemoving($id);

        return $this->getLayout()->createDeleteComment($component);
    }

    /**
     * @throws \Throwable
     */
    public function delete()
    {
        try {
            $id = $this->getCall()->getRoute()->getParam('id');

            $component = $this->blogGetComponentFactory()->getCommentFactory()->createUsecaseRemoving($id);

            $this->getCall()->setResponseToSimple($component->delete());
        } catch (\Exception $e) {
            $this->handleError($e);
        }
    }
}