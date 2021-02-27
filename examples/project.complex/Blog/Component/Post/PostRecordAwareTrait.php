<?php

namespace Blog\Component\Post;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

trait PostRecordAwareTrait
{
    /**
     * @var PostRecordInterface
     */
    private $post;

    /**
     * @return PostRecordInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param PostRecordInterface $post
     * @return self
     */
    public function setPost(PostRecordInterface $post)
    {
        $this->post = $post;

        return $this;
    }
}