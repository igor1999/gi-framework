<?php

namespace Blog\Logging\Controller\DBActions\Post;

use GI\Logger\Controller\AbstractController;
use Blog\Logging\FSO\Map;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

abstract class AbstractPost extends AbstractController implements PostInterface
{
    use ServiceLocatorAwareTrait;


    const TITLE = '';


    /**
     * @param PostRecordInterface $post
     * @return self
     * @throws \Exception
     */
    public function log(PostRecordInterface $post)
    {
        $this->getLogger()->log(Map::DB_POST, static::TITLE, $this->createText($post));

        return $this;
    }

    /**
     * @param PostRecordInterface $post
     * @return string
     * @throws \Exception
     */
    abstract protected function createText(PostRecordInterface $post);
}