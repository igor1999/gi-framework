<?php

namespace Blog\Component\Post\Detail\Usecase;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Detail\Usecase\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Usecase\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Detail\Full\FullInterface as PostDetailInterface;
use Blog\Component\Comment\Feed\FeedInterface as CommentFeedInterface;

class Detail extends AbstractComponent implements DetailInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var PostRecordInterface
     */
    private $post;

    /**
     * @var PostDetailInterface
     */
    private $postDetailComponent;

    /**
     * @var CommentFeedInterface
     */
    private $commentFeedComponent;


    /**
     * Detail constructor.
     * @param int $id
     * @throws \Exception
     */
    public function __construct($id)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->post = $this->blogGetRDBORMFactory()->createPostRecord($id);

        $this->postDetailComponent  = $this->blogGetComponentFactory()->getPostFactory()->createFullDetail($this->post);
        $this->commentFeedComponent = $this->blogGetComponentFactory()->getCommentFactory()->createFeed(
            $this->post->getComments()
        );
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return PostRecordInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return PostDetailInterface
     */
    protected function getPostDetailComponent()
    {
        return $this->postDetailComponent;
    }

    /**
     * @return CommentFeedInterface
     */
    protected function getCommentFeedComponent()
    {
        return $this->commentFeedComponent;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()
            ->setPostDetailComponent($this->getPostDetailComponent())
            ->setCommentFeedComponent($this->getCommentFeedComponent())
            ->toString();
    }
}