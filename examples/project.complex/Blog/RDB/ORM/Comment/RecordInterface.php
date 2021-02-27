<?php

namespace Blog\RDB\ORM\Comment;

use GI\RDB\ORM\Record\RecordInterface as BaseInterface;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;

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
     * @return int
     */
    public function getPostID();

    /**
     * @param int $postID
     * @return self
     */
    public function setPostID($postID);

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
     * @return PostRecordInterface
     * @throws \Exception
     */
    public function getPost();
}