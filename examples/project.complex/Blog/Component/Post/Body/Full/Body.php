<?php

namespace Blog\Component\Post\Body\Full;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Body\Full\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Body\Full\View\ViewInterface;

class Body extends AbstractComponent implements BodyInterface
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
     * Body constructor.
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

        return $this->getView()->toString();
    }
}