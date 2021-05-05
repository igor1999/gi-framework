<?php

namespace Blog\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use Blog\Component\Layout\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Layout\I18n\I18nAwareTrait;

use Blog\Component\Layout\View\ViewInterface;
use Blog\Component\BreadCrumbs\BreadCrumbsInterface;
use Blog\Component\Post\Feed\Usecase\UsecaseInterface as FeedUsecaseInterface;
use Blog\Component\Post\Detail\Usecase\DetailInterface as PostDetailInterface;
use Blog\Component\Post\Modifying\Creation\CreationInterface as PostCreationInterface;
use Blog\Component\Post\Modifying\Edition\EditionInterface as PostEditionInterface;
use Blog\Component\Comment\Usecase\Creation\CreationInterface as CommentCreationInterface;
use Blog\Component\Comment\Usecase\Removing\RemovingInterface as CommentRemovingInterface;
use Blog\Component\User\Statistic\Single\Usecase\SingleInterface as StatisticSingleInterface;
use Blog\Component\User\Statistic\Totally\TotallyInterface as StatisticTotallyInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var BreadCrumbsInterface
     */
    private $naviBreadCrumbs;


    /**
     * Layout constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->naviBreadCrumbs = $this->blogGetComponentFactory()->createBreadCrumbs();
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return BreadCrumbsInterface
     */
    public function getNaviBreadCrumbs()
    {
        return $this->naviBreadCrumbs;
    }

    /**
     * @param FeedUsecaseInterface $feed
     * @return self
     */
    public function createPostFeed(FeedUsecaseInterface $feed)
    {
        $this->getNaviBreadCrumbs()->selectFeed();

        $this->setTitle($this->translate('Feed'))->setContent($feed);

        return $this;
    }

    /**
     * @param PostDetailInterface $postDetail
     * @return self
     */
    public function createPostDetail(PostDetailInterface $postDetail)
    {
        $this->getNaviBreadCrumbs()->selectPost($postDetail->getPost()->getId(), $postDetail->getPost()->getTitle());

        $this->setTitle($this->translate('Post detail'))->setContent($postDetail);

        return $this;
    }

    /**
     * @param PostEditionInterface $edition
     * @return self
     */
    public function createPostEdit(PostEditionInterface $edition)
    {
        $this->getNaviBreadCrumbs()->selectEditPost($edition->getPost()->getId(), $edition->getPost()->getTitle());

        $this->setTitle($this->translate('Edit post'))->setContent($edition);

        return $this;
    }

    /**
     * @param PostCreationInterface $creation
     * @return self
     */
    public function createNewPost(PostCreationInterface $creation)
    {
        $this->getNaviBreadCrumbs()->selectNewPost();

        $this->setTitle($this->translate('New post'))->setContent($creation);

        return $this;
    }

    /**
     * @param CommentCreationInterface $creation
     * @return self
     */
    public function createNewComment(CommentCreationInterface $creation)
    {
        $this->getNaviBreadCrumbs()->selectNewComment($creation->getPost()->getId(), $creation->getPost()->getTitle());

        $this->setTitle($this->translate('New comment'))->setContent($creation);

        return $this;
    }

    /**
     * @param CommentRemovingInterface $removing
     * @return self
     * @throws \Exception
     */
    public function createDeleteComment(CommentRemovingInterface $removing)
    {
        $this->getNaviBreadCrumbs()->selectDeleteComment(
            $removing->getComment()->getPostID(), $removing->getComment()->getPost()->getTitle()
        );

        $this->setTitle($this->translate('Delete comment'))->setContent($removing);

        return $this;
    }

    /**
     * @param StatisticSingleInterface $statisticSingle
     * @return self
     */
    public function createStatisticSingle(StatisticSingleInterface $statisticSingle)
    {
        $this->getNaviBreadCrumbs()->selectUserStatisticSingle(
            $statisticSingle->getUser()->getId(), $statisticSingle->getUser()->getLogin()
        );

        $this->setTitle($this->translate('User posts'))->setContent($statisticSingle);

        return $this;
    }

    /**
     * @param StatisticTotallyInterface $statisticTotally
     * @return self
     */
    public function createStatisticTotally(StatisticTotallyInterface $statisticTotally)
    {
        $this->getNaviBreadCrumbs()->selectUserStatisticTotally();

        $this->setTitle($this->translate('User statistic totally'))->setContent($statisticTotally);

        return $this;
    }

    /**
     * @param string $message
     * @return self
     */
    public function createAccessDenied($message)
    {
        $this->getNaviBreadCrumbs()->selectError();

        parent::createAccessDenied($message);

        return $this;
    }

    /**
     * @param string $message
     * @return self
     */
    public function createNotFound($message)
    {
        $this->getNaviBreadCrumbs()->selectError();

        parent::createNotFound($message);

        return $this;
    }

    /**
     * @param string $message
     * @return self
     */
    public function createServerError($message)
    {
        $this->getNaviBreadCrumbs()->selectError();

        parent::createServerError($message);

        return $this;
    }
}
