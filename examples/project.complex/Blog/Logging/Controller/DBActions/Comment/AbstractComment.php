<?php

namespace Blog\Logging\Controller\DBActions\Comment;

use GI\Logger\Controller\AbstractController;
use Blog\Logging\FSO\Map;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

abstract class AbstractComment extends AbstractController implements CommentInterface
{
    use ServiceLocatorAwareTrait;


    const TITLE = '';


    /**
     * @param CommentRecordInterface $comment
     * @return self
     * @throws \Exception
     */
    public function log(CommentRecordInterface $comment)
    {
        $this->getLogger()->log(Map::DB_COMMENT, static::TITLE, $this->createText($comment));

        return $this;
    }

    /**
     * @param CommentRecordInterface $comment
     * @return string
     * @throws \Exception
     */
    abstract protected function createText(CommentRecordInterface $comment);
}