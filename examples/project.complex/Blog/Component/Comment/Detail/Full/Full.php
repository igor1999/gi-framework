<?php

namespace Blog\Component\Comment\Detail\Full;

use Blog\Component\Comment\Detail\Base\AbstractDetail;
use Blog\Component\Comment\Detail\Full\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareTrait;
use Blog\Component\Comment\Detail\Base\Part\FooterAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\Component\Comment\Detail\Full\View\ViewInterface;

class Full extends AbstractDetail implements FullInterface
{
    use ServiceLocatorAwareTrait, HeaderAwareTrait, BodyAwareTrait, FooterAwareTrait;


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
        $this->footer = $this->blogGetComponentFactory()->getCommentFactory()->createDetailFooter($this->getComment());
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }
}