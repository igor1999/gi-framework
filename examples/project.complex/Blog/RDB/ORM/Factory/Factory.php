<?php

namespace Blog\RDB\ORM\Factory;

use GI\RDB\ORM\Factory\AbstractFactory as Base;

use Blog\RDB\ORM\Post\Record as PostRecord;
use Blog\RDB\ORM\Post\Set as PostSet;
use Blog\RDB\ORM\Comment\Record as CommentRecord;
use Blog\RDB\ORM\Comment\Set as CommentSet;
use Blog\RDB\ORM\User\Record as UserRecord;
use Blog\RDB\ORM\User\Set as UserSet;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\Post\SetInterface as PostSetInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Blog\RDB\ORM\User\SetInterface as UserSetInterface;

/**
 * Class Factory
 * @package Blog\RDB\ORM\Factory
 *
 * @method PostRecordInterface createPostRecord($primaryKey = null)
 * @method PostSetInterface createPostSet()
 * @method CommentRecordInterface createCommentRecord($primaryKey = null)
 * @method CommentSetInterface createCommentSet()
 * @method UserRecordInterface createUserRecord($primaryKey = null)
 * @method UserSetInterface createUserSet()
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('PostRecord', PostRecord::class)
            ->setNamed('PostSet', PostSet::class)
            ->setNamed('CommentRecord', CommentRecord::class)
            ->setNamed('CommentSet', CommentSet::class)
            ->setNamed('UserRecord', UserRecord::class)
            ->setNamed('UserSet', UserSet::class);
    }
}