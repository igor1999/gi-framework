<?php

namespace Blog\Component\Post\Body\Short;

use Blog\Component\Post\Body\Full\Body as Base;
use Blog\Component\Post\Body\Short\View\View;

use Blog\Component\Post\Body\Short\View\ViewInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

class Body extends Base implements BodyInterface
{
    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Body constructor.
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function __construct(PostRecordInterface $post)
    {
        parent::__construct($post);

        $this->view = $this->giGetDi(ViewInterface::class, View::class);
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }
}