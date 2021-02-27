<?php

namespace Blog\Email\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

use Blog\Email\NewComment\NewCommentInterface;

/**
 * Interface FactoryInterface
 * @package Blog\Email\Factory
 *
 * @method NewCommentInterface createNewComment(CommentRecordInterface $record)
 */
interface FactoryInterface extends BaseInterface
{

}