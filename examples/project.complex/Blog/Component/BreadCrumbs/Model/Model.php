<?php

namespace Blog\Component\BreadCrumbs\Model;

use GI\ClientContents\BreadCrumbs\Container\AbstractContainer;
use Blog\Component\BreadCrumbs\I18n\Glossary;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\ClientContents\BreadCrumbs\Node\NodeInterface;
use GI\ClientContents\BreadCrumbs\Track\TrackInterface;
use Blog\Component\BreadCrumbs\I18n\GlossaryInterface;

/**
 * Class Model
 * @package Blog\Component\BreadCrumbs\Model
 *
 * @method NodeInterface getFeed()
 * @method NodeInterface getPost()
 * @method NodeInterface getEditPost()
 * @method NodeInterface getNewPost()
 * @method NodeInterface getNewComment()
 * @method NodeInterface getDeleteComment()
 * @method NodeInterface getUserStatisticSingle()
 * @method NodeInterface getUserStatisticTotally()
 * @method NodeInterface getError()
 */
class Model extends AbstractContainer implements ModelInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Model constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->getFeed()
            ->setTitle($this->giTranslate(GlossaryInterface::class, Glossary::class, 'feed'))
            ->setLink($this->blogGetRouteTree()->getPostTree()->getFeed()->build());

        $this->getEditPost()
            ->setTitle($this->giTranslate(GlossaryInterface::class, Glossary::class, 'edit post'));

        $this->getNewComment()
            ->setTitle($this->giTranslate(GlossaryInterface::class, Glossary::class, 'new comment'));

        $this->getDeleteComment()->setTitle(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'delete comment')
        );

        $this->getNewPost()
            ->setTitle($this->giTranslate(GlossaryInterface::class, Glossary::class, 'new post'))
            ->setLink($this->blogGetRouteTree()->getPostTree()->getNew()->build());

        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class, 'user statistic totally'
        );
        $this->getUserStatisticTotally()
            ->setTitle($title)
            ->setLink($this->blogGetRouteTree()->getUserTree()->getStatisticTree()->getTotally()->build());

        $this->getError()
            ->setTitle($this->giTranslate(GlossaryInterface::class, Glossary::class, 'error'))
            ->setLinkToMock();
    }

    /**
     * @return array
     */
    protected function getContents()
    {
        return [
            'feed' => [
                'post' => [
                    'edit-post',
                    'new-comment',
                    'delete-comment'
                ],
                'new-post',
                'user-statistic-single',
                'user-statistic-totally',
                'error',
            ]
        ];
    }

    /**
     * @param int $id
     * @param string $title
     * @return self
     */
    protected function configPost($id, $title)
    {
        $link = $this->blogGetRouteTree()->getPostTree()->buildDetailWithId($id);

        $this->getPost()->setTitle($title)->setLink($link);

        return $this;
    }

    /**
     * @param int $id
     * @return self
     */
    protected function configEditPost($id)
    {
        $link = $this->blogGetRouteTree()->getPostTree()->buildEditWithId($id);

        $this->getEditPost()->setLink($link);

        return $this;
    }

    /**
     * @param int $postID
     * @return self
     */
    protected function configNewComment($postID)
    {
        $link = $this->blogGetRouteTree()->getCommentTree()->buildNewWithPostID($postID);

        $this->getNewComment()->setLink($link);

        return $this;
    }

    /**
     * @param int $id
     * @return self
     */
    protected function configDeleteComment($id)
    {
        $link = $this->blogGetRouteTree()->getCommentTree()->buildDeleteWithId($id);

        $this->getNewComment()->setLink($link);

        return $this;
    }

    /**
     * @param int $id
     * @param string $login
     * @return self
     */
    protected function configUserStatisticSingle($id, $login)
    {
        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class, 'statistic of')
            . ' '
            . $login;

        $link = $this->blogGetRouteTree()->getUserTree()->getStatisticTree()->buildSingleWithId($id);

        $this->getUserStatisticSingle()->setTitle($title)->setLink($link);

        return $this;
    }

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectFeed()
    {
        return $this->getFeed()->getBreadCrumbs();
    }

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectPost($id, $title)
    {
        return $this->configPost($id, $title)->getPost()->getBreadCrumbs();
    }

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectEditPost($id, $title)
    {
        return $this->configPost($id, $title)->configEditPost($id)->getEditPost()->getBreadCrumbs();
    }

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectNewComment($id, $title)
    {
        return $this->configPost($id, $title)->configNewComment($id)->getNewComment()->getBreadCrumbs();
    }

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectDeleteComment($id, $title)
    {
        return $this->configPost($id, $title)->configDeleteComment($id)->getDeleteComment()->getBreadCrumbs();
    }

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectNewPost()
    {
        return $this->getNewPost()->getBreadCrumbs();
    }

    /**
     * @param int $id
     * @param string $login
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectUserStatisticSingle($id, $login)
    {
        return $this->configUserStatisticSingle($id, $login)->getUserStatisticSingle()->getBreadCrumbs();
    }

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectUserStatisticTotally()
    {
        return $this->getUserStatisticTotally()->getBreadCrumbs();
    }

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectError()
    {
        return $this->getError()->getBreadCrumbs();
    }
}