<?php

namespace Blog\Logging\Controller\DBActions\Post;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

class Removing extends AbstractPost implements RemovingInterface
{
    const TITLE = 'removed post';


    /**
     * @param PostRecordInterface $post
     * @return string
     * @throws \Exception
     */
    protected function createText(PostRecordInterface $post)
    {
        return <<<TEXT

ID:         {$post->getId()}
Title:      {$post->getTitle()}
Author:     {$post->getUser()->getLogin()}

Removed by: {$this->blogGetIdentity()->getLogin()}

TEXT;
    }
}