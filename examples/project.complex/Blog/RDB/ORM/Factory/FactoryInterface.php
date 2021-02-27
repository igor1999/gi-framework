<?php

namespace Blog\RDB\ORM\Factory;

use GI\RDB\ORM\Factory\FactoryInterface as BaseInterface;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\Post\SetInterface as PostSetInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Blog\RDB\ORM\User\SetInterface as UserSetInterface;

/**
 * Interface FactoryInterface
 * @package Blog\RDB\ORM\Factory
 *
 * @method PostRecordInterface createPostRecord($primaryKey = null)
 * @method PostSetInterface createPostSet()
 * @method CommentRecordInterface createCommentRecord($primaryKey = null)
 * @method CommentSetInterface createCommentSet()
 * @method UserRecordInterface createUserRecord($primaryKey = null)
 * @method UserSetInterface createUserSet()
 */
interface FactoryInterface extends BaseInterface
{

}