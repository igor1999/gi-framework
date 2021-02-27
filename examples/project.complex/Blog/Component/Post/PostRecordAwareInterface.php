<?php

namespace Blog\Component\Post;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface PostRecordAwareInterface
{
    /**
     * @return PostRecordInterface
     */
    public function getPost();

    /**
     * @param PostRecordInterface $post
     * @return self
     */
    public function setPost(PostRecordInterface $post);
}