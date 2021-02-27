<?php

namespace Blog\Module\Call\Web\Container\Post;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Blog\Module\Call\Web\BaseCall;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Web\BaseCallInterface;

use Blog\Component\Post\Feed\Usecase\Gate\Gate as PostFeedGate;
use Blog\Component\Post\Detail\Usecase\Gate\Gate as PostDetailGate;
use Blog\Component\Post\Modifying\Creation\Gate\Gate as ModifyingCreationGate;
use Blog\Component\Post\Modifying\Edition\Gate\Gate as ModifyingEditionGate;

class Post extends Base implements PostInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createFeed()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getPostTree()->getFeed(),
            function(BaseCallInterface $call)
            {
                (new PostFeedGate($call))->dispatch();

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createDetail()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getPostTree()->getDetail(),
            function(BaseCallInterface $call)
            {
                (new PostDetailGate($call))->dispatch();

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createEdit()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getPostTree()->getEdit(),
            function(BaseCallInterface $call)
            {
                (new ModifyingEditionGate($call))->dispatch();

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
    protected function createSaveEdit()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getPostTree()->getSaveEdit(),
            function(BaseCallInterface $call)
            {
                (new ModifyingEditionGate($call))->save();

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
            $this->blogGetRouteTree()->getPostTree()->getExecuteDelete(),
            function(BaseCallInterface $call)
            {
                (new ModifyingEditionGate($call))->delete();

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
    protected function createNew()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getPostTree()->getNew(),
            function(BaseCallInterface $call)
            {
                (new ModifyingCreationGate($call))->dispatch();

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
            $this->blogGetRouteTree()->getPostTree()->getSaveNew(),
            function(BaseCallInterface $call)
            {
                (new ModifyingCreationGate($call))->save();

                return true;
            },
            $this->giGetAccessProfile()
        );
    }
}