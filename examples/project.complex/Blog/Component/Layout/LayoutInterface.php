<?php

namespace Blog\Component\Layout;

use GI\Component\Layout\LayoutInterface as BaseInterface;
use Blog\Component\Layout\View\ViewInterface;
use Blog\Component\Post\Feed\Usecase\UsecaseInterface as FeedUsecaseInterface;
use Blog\Component\Post\Detail\Usecase\DetailInterface as PostDetailInterface;
use Blog\Component\Post\Modifying\Creation\CreationInterface as PostCreationInterface;
use Blog\Component\Post\Modifying\Edition\EditionInterface as PostEditionInterface;
use Blog\Component\Comment\Usecase\Creation\CreationInterface as CommentCreationInterface;
use Blog\Component\Comment\Usecase\Removing\RemovingInterface as CommentRemovingInterface;
use Blog\Component\User\Statistic\Single\Usecase\SingleInterface as StatisticSingleInterface;
use Blog\Component\User\Statistic\Totally\Usecase\TotallyInterface as StatisticTotallyInterface;

interface LayoutInterface extends BaseInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @param FeedUsecaseInterface $feed
     * @return self
     */
    public function createPostFeed(FeedUsecaseInterface $feed);

    /**
     * @param PostDetailInterface $postDetail
     * @return self
     */
    public function createPostDetail(PostDetailInterface $postDetail);

    /**
     * @param PostEditionInterface $edition
     * @return self
     */
    public function createPostEdit(PostEditionInterface $edition);

    /**
     * @param PostCreationInterface $creation
     * @return self
     */
    public function createNewPost(PostCreationInterface $creation);

    /**
     * @param CommentCreationInterface $creation
     * @return self
     */
    public function createNewComment(CommentCreationInterface $creation);

    /**
     * @param CommentRemovingInterface $removing
     * @return self
     * @throws \Exception
     */
    public function createDeleteComment(CommentRemovingInterface $removing);

    /**
     * @param StatisticSingleInterface $statisticSingle
     * @return self
     */
    public function createStatisticSingle(StatisticSingleInterface $statisticSingle);

    /**
     * @param StatisticTotallyInterface $statisticTotally
     * @return self
     */
    public function createStatisticTotally(StatisticTotallyInterface $statisticTotally);
}