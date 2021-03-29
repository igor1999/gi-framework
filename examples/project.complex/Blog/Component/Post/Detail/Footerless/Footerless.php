<?php

namespace Blog\Component\Post\Detail\Footerless;

use Blog\Component\Post\Detail\Base\AbstractDetail;
use Blog\Component\Post\Detail\Footerless\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareTrait;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Detail\Footerless\View\ViewInterface;

class Footerless extends AbstractDetail implements FooterlessInterface
{
    use ServiceLocatorAwareTrait, HeaderAwareTrait, FullBodyAwareTrait;


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
        $this->body   = $this->blogGetComponentFactory()->getPostFactory()->createDetailFullBody($this->getPost());
    }

    /**
     * @return ViewInterface
     */
    protected function getView()
    {
        return $this->view;
    }
}