<?php

namespace Blog\Component\Comment\Detail\Footerless;

use Blog\Component\Comment\Detail\Base\AbstractDetail;
use Blog\Component\Comment\Detail\Footerless\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\Component\Comment\Detail\Footerless\View\ViewInterface;

class Footerless extends AbstractDetail implements FooterlessInterface
{
    use ServiceLocatorAwareTrait, HeaderAwareTrait, BodyAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Footerless constructor.
     * @param CommentRecordInterface $comment
     * @throws \Exception
     */
    public function __construct(CommentRecordInterface $comment)
    {
        parent::__construct($comment);

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->header = $this->blogGetComponentFactory()->getCommentFactory()->createDetailHeader($this->getComment());
        $this->body   = $this->blogGetComponentFactory()->getCommentFactory()->createDetailBody($this->getComment());
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }
}