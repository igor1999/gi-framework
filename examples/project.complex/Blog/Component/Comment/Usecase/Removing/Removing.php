<?php

namespace Blog\Component\Comment\Usecase\Removing;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Comment\Usecase\Removing\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Footerless\FooterlessInterface as PostDetailInterface;
use Blog\Component\Comment\Detail\Footerless\FooterlessInterface as CommentDetailInterface;
use Blog\Component\Comment\Usecase\Removing\View\ViewInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

class Removing extends AbstractComponent implements RemovingInterface
{
    use ServiceLocatorAwareTrait;


    const VALIDATED_PARAM = 'CSRF-token';


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var CommentRecordInterface
     */
    private $comment;

    /**
     * @var PostDetailInterface
     */
    private $postDetailComponent;

    /**
     * @var CommentDetailInterface
     */
    private $commentDetailComponent;


    /**
     * Removing constructor.
     * @param int $id
     * @throws \Exception
     */
    public function __construct($id)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->comment = $this->blogGetRDBORMFactory()->createCommentRecord($id);

        $this->postDetailComponent  = $this->blogGetComponentFactory()->getPostFactory()->createFooterlessDetail(
            $this->comment->getPost()
        );

        $this->commentDetailComponent = $this->blogGetComponentFactory()->getCommentFactory()->createFooterlessDetail(
            $this->comment
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
     * @return CommentRecordInterface
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return PostDetailInterface
     */
    protected function getPostDetailComponent()
    {
        return $this->postDetailComponent;
    }

    /**
     * @return CommentDetailInterface
     */
    public function getCommentDetailComponent()
    {
        return $this->commentDetailComponent;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()
            ->setPostDetailComponent($this->getPostDetailComponent())
            ->setCommentDetailComponent($this->getCommentDetailComponent())
            ->setId($this->getComment()->getId())
            ->toString();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function delete()
    {
        $this->blogGetIdentity()->validateDeleteComment($this->getComment());

        $this->getComment()->delete();

        $this->blogGetLoggingFactory()->getDBActionsFactory()->getCommentRemoving()->log($this->getComment());

        return $this->blogGetRouteTree()->getPostTree()->buildDetailWithId($this->getComment()->getPostID());
    }
}