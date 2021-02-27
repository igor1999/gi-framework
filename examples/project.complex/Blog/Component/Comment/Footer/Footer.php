<?php

namespace Blog\Component\Comment\Footer;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Comment\Footer\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\Component\Comment\Footer\View\ViewInterface;

class Footer extends AbstractComponent implements FooterInterface
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
     * Footer constructor.
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

        return $this->getView()
            ->setAllowDelete($this->blogGetIdentity()->allowDeleteComment($this->getComment()))
            ->toString();
    }
}