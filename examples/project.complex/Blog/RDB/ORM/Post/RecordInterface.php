<?php

namespace Blog\RDB\ORM\Post;

use GI\RDB\ORM\Record\RecordInterface as BaseInterface;

use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;

interface RecordInterface extends BaseInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getAuthorID();

    /**
     * @param int $authorID
     * @return self
     */
    public function setAuthorID($authorID);

    /**
     * @return string
     */
    public function getCreateAt();

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getCreateAtAsDateTime();

    /**
     * @param string $createAt
     * @return self
     */
    public function setCreateAt($createAt);

    /**
     * @return self
     */
    public function setCreateAtToNow();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return self
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return self
     */
    public function setText($text);

    /**
     * @return UserRecordInterface
     * @throws \Exception
     */
    public function getUser();

    /**
     * @return CommentSetInterface
     * @throws \Exception
     */
    public function getComments();

    /**
     * @return int
     */
    public function getCommentsCount();
}