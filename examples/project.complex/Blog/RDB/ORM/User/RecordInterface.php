<?php

namespace Blog\RDB\ORM\User;

use GI\RDB\ORM\Record\RecordInterface as BaseInterface;

use Blog\RDB\ORM\Post\SetInterface as PostSetInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;

interface RecordInterface extends BaseInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getLogin();

    /**
     * @param string $login
     * @return self
     */
    public function setLogin($login);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email);

    /**
     * @return PostSetInterface
     * @throws \Exception
     */
    public function getPosts();

    /**
     * @return CommentSetInterface
     * @throws \Exception
     */
    public function getComments();

    /**
     * @param string $createAt
     * @return array
     */
    public function getPostsStat($createAt);

    /**
     * @param string $createAt
     * @return array
     */
    public function getCommentsStat($createAt);

    /**
     * @return int
     */
    public function getPostsTotal();

    /**
     * @return int
     */
    public function getCommentsTotal();

    /**
     * @return int
     */
    public function getReceivedCommentsTotal();
}