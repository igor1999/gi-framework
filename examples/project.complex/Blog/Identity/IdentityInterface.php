<?php

namespace Blog\Identity;

use GI\Identity\ArrayIdentity\IdentityInterface as BaseInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

/**
 * Interface IdentityInterface
 * @package Blog\Identity
 *
 * @method getEmail()
 */
interface IdentityInterface extends BaseInterface
{
    /**
     * @return int
     * @throws \Exception
     */
    public function getID();

    /**
     * @return string
     * @throws \Exception
     */
    public function getLogin();

    /**
     * @return string
     * @throws \Exception
     */
    public function getSignature();

    /**
     * @param PostRecordInterface $post
     * @return bool
     * @throws \Exception
     */
    public function allowEditPost(PostRecordInterface $post);

    /**
     * @param PostRecordInterface $post
     * @return bool
     * @throws \Exception
     */
    public function allowDeletePost(PostRecordInterface $post);

    /**
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function validateEditPost(PostRecordInterface $post);

    /**
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function validateDeletePost(PostRecordInterface $post);

    /**
     * @param CommentRecordInterface $comment
     * @return bool
     * @throws \Exception
     */
    public function allowDeleteComment(CommentRecordInterface $comment);

    /**
     * @param CommentRecordInterface $comment
     * @throws \Exception
     */
    public function validateDeleteComment(CommentRecordInterface $comment);
}