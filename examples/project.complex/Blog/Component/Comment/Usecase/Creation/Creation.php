<?php

namespace Blog\Component\Comment\Usecase\Creation;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Comment\Usecase\Creation\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Footerless\FooterlessInterface as PostDetailInterface;
use Blog\Component\Comment\Modifying\Creation\CreationInterface as CommentCreationFormInterface;
use Blog\Component\Comment\Usecase\Creation\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

class Creation extends AbstractComponent implements CreationInterface
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
     * @var CommentCreationFormInterface
     */
    private $commentFormComponent;


    /**
     * Creation constructor.
     * @param int $postID
     * @throws \Exception
     */
    public function __construct($postID)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->post = $this->blogGetRDBORMFactory()->createPostRecord($postID);

        $this->postDetailComponent  = $this->blogGetComponentFactory()->getPostFactory()->createFooterlessDetail(
            $this->post
        );

        $this->commentFormComponent = $this->blogGetComponentFactory()->getCommentFactory()->createCreation(
            $postID
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
     * @return CommentCreationFormInterface
     */
    public function getCommentFormComponent()
    {
        return $this->commentFormComponent;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()
            ->setPostDetailComponent($this->getPostDetailComponent())
            ->setCommentFormComponent($this->getCommentFormComponent())
            ->toString();
    }
}