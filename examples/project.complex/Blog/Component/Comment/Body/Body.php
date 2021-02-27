<?php

namespace Blog\Component\Comment\Body;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Comment\Body\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\Component\Comment\Body\View\ViewInterface;

class Body extends AbstractComponent implements BodyInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var CommentRecordInterface
     */
    private $comment;


    /**
     * Body constructor.
     * @param CommentRecordInterface $comment
     * @throws \Exception
     */
    public function __construct(CommentRecordInterface $comment)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->comment = $comment;
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
    protected function getComment()
    {
        return $this->comment;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $this->getView()->setComment($this->getComment());

        return $this->getView()->toString();
    }
}