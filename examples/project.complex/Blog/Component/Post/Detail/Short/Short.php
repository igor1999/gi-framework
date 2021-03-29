<?php

namespace Blog\Component\Post\Detail\Short;

use Blog\Component\Post\Detail\Base\AbstractDetail;
use Blog\Component\Post\Detail\Short\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\Detail\Base\Part\ShortBodyAwareTrait;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareTrait;
use Blog\Component\Post\Detail\Base\Part\FooterAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Detail\Short\View\ViewInterface;

class Short extends AbstractDetail implements ShortInterface
{
    use ServiceLocatorAwareTrait, HeaderAwareTrait, ShortBodyAwareTrait, FooterAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Footerless constructor.
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function __construct(PostRecordInterface $post)
    {
        parent::__construct($post);

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->header = $this->blogGetComponentFactory()->getPostFactory()->createDetailHeader($this->getPost());
        $this->body   = $this->blogGetComponentFactory()->getPostFactory()->createDetailShortBody($this->getPost());
        $this->footer = $this->blogGetComponentFactory()->getPostFactory()->createDetailFooter($this->getPost());
    }

    /**
     * @return ViewInterface
     */
    protected function getView()
    {
        return $this->view;
    }
}