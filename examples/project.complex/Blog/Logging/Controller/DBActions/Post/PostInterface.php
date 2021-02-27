<?php

namespace Blog\Logging\Controller\DBActions\Post;

use GI\Logger\Controller\ControllerInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface PostInterface extends ControllerInterface
{
    /**
     * @param PostRecordInterface $post
     * @return self
     * @throws \Exception
     */
    public function log(PostRecordInterface $post);
}