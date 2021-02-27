<?php

namespace Blog\Component\Post\Footer;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Footer\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Footer\View\ViewInterface;

class Footer extends AbstractComponent implements FooterInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var PostRecordInterface
     */
    private $post;


    /**
     * Footer constructor.
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function __construct(PostRecordInterface $post)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->post = $post;
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return PostRecordInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $this->getView()->setPost($this->getPost());

        return $this->getView()
            ->setAllowEdit($this->blogGetIdentity()->allowEditPost($this->getPost()))
            ->setAllowAddComment($this->blogGetIdentity()->isAuthenticated())
            ->toString();
    }
}