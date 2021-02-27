<?php

namespace Blog\Component\Post\Detail\Usecase\Gate;

use GI\RDB\ORM\Exception\NotFound as ORMNotFoundException;

use Blog\Component\Base\Gate\AbstractUsecase as Base;
use Blog\RDB\ORM\Post\Record as PostRecord;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Layout\LayoutInterface;
use GI\Application\Call\Web\CallInterface as WebCallInterface;

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
            ORMNotFoundException::class, $response, PostRecord::class, true
        );
    }

    /**
     * @return LayoutInterface
     * @throws \Exception
     */
    protected function createUsecase()
    {
        $id = $this->getCall()->getRoute()->getParam('id');

        $component = $this->blogGetComponentFactory()->getPostFactory()->createDetailUsecase($id);

        return $this->getLayout()->createPostDetail($component);
    }
}