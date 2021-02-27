<?php

namespace Blog\Email\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Email\NewComment\NewComment;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\Email\NewComment\NewCommentInterface;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

/**
 * Class Factory
 * @package Blog\Email\Factory
 *
 * @method NewCommentInterface createNewComment(CommentRecordInterface $record)
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
        $this->set(NewComment::class);
    }
}