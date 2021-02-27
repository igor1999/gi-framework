<?php

namespace Blog\RDB\ORM\Comment;

use GI\RDB\ORM\Set\AbstractSet as Base;
use Blog\RDB\ORM\Comment\Record as CommentRecord;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

class Set extends Base implements SetInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return CommentRecordInterface
     */
    public function createTemplateItem()
    {
        return new CommentRecord();
    }

    /**
     * @param int $index
     * @return CommentRecordInterface
     * @throws \Exception
     */
    public function get($index)
    {
        /** @var CommentRecordInterface $result */
        $result = parent::get($index);

        return $result;
    }

    /**
     * @return CommentRecordInterface
     * @throws \Exception
     */
    public function getFirst()
    {
        /** @var CommentRecordInterface $result */
        $result = parent::getFirst();

        return $result;
    }

    /**
     * @return CommentRecordInterface
     * @throws \Exception
     */
    public function getLast()
    {
        /** @var CommentRecordInterface $result */
        $result = parent::getLast();

        return $result;
    }

    /**
     * @return CommentRecordInterface[]
     */
    public function getItems()
    {
        /** @var CommentRecordInterface[] $result */
        $result = parent::getItems();

        return $result;
    }
}