<?php

namespace Blog\Component\Comment\Feed;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Comment\Feed\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Comment\Feed\View\ViewInterface;
use Blog\Component\Comment\Detail\Full\FullInterface as DetailInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;

class Feed extends AbstractComponent implements FeedInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var CommentSetInterface
     */
    private $commentSet;


    /**
     * Set constructor.
     * @param CommentSetInterface $commentSet
     * @throws \Exception
     */
    public function __construct(CommentSetInterface $commentSet)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->commentSet = $commentSet;
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return CommentSetInterface
     */
    protected function getCommentSet()
    {
        return $this->commentSet;
    }

    /**
     * @return DetailInterface[]
     */
    protected function createEntries()
    {
        $entries = [];

        foreach ($this->getCommentSet()->getItems() as $comment) {
            $entries[] = $this->blogGetComponentFactory()->getCommentFactory()->createFullDetail($comment);
        }

        return $entries;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setEntries($this->createEntries())->toString();
    }
}