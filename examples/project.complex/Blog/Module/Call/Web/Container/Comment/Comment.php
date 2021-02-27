<?php

namespace Blog\Module\Call\Web\Container\Comment;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Blog\Module\Call\Web\BaseCall;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Web\BaseCallInterface;

use Blog\Component\Comment\Modifying\Creation\Gate\Gate as CommentCreationGate;
use Blog\Component\Comment\Usecase\Creation\Gate\Gate as CommentUsecaseCreationGate;
use Blog\Component\Comment\Usecase\Removing\Gate\Gate as CommentUsecaseRemovingGate;

class Comment extends Base implements CommentInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createNew()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getCommentTree()->getNew(),
            function(BaseCallInterface $call)
            {
                (new CommentUsecaseCreationGate($call))->dispatch();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createSaveNew()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getCommentTree()->getSaveNew(),
            function(BaseCallInterface $call)
            {
                (new CommentCreationGate($call))->save();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createDelete()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getCommentTree()->getDelete(),
            function(BaseCallInterface $call)
            {
                (new CommentUsecaseRemovingGate($call))->dispatch();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createExecuteDelete()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getCommentTree()->getExecuteDelete(),
            function(BaseCallInterface $call)
            {
                (new CommentUsecaseRemovingGate($call))->delete();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }
}