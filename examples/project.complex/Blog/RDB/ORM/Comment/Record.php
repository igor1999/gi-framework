<?php

namespace Blog\RDB\ORM\Comment;

use GI\RDB\ORM\Record\AbstractRecord as Base;
use Blog\RDB\ORM\Post\Record as PostRecord;
use Blog\RDB\ORM\User\Record as UserRecord;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use GI\RDB\Meta\Table\TableInterface as DBTableInterface;

class Record extends Base implements RecordInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var int
     */
    private $authorID = 0;

    /**
     * @var int
     */
    private $postID = 0;

    /**
     * @var string
     */
    private $createAt;

    /**
     * @var string
     */
    private $text;

    /**
     * @var UserRecordInterface
     */
    private $user;

    /**
     * @var PostRecordInterface
     */
    private $post;


    /**
     * @return DBTableInterface
     */
    public function getTable()
    {
        return $this->blogGetRDBDriverFactory()->getMain()->getComment();
    }

    /**
     * @to-db id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @from-db id
     * @param int $id
     * @return self
     */
    protected function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * @Blog\RDB\ORM\User\Record id
     * @to-db author_id
     * @return int
     */
    public function getAuthorID()
    {
        return $this->authorID;
    }

    /**
     * @from-db author_id
     * @param int $authorID
     * @return self
     */
    public function setAuthorID($authorID)
    {
        $this->authorID = (int)$authorID;

        return $this;
    }

    /**
     * @Blog\RDB\ORM\Post\Record id
     * @to-db post_id
     * @return int
     */
    public function getPostID()
    {
        return $this->postID;
    }

    /**
     * @from-db post_id
     * @param int $postID
     * @return self
     */
    public function setPostID($postID)
    {
        $this->postID = (int)$postID;

        return $this;
    }

    /**
     * @to-db create_at
     * @extract
     * @return string
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getCreateAtAsDateTime()
    {
        return new \DateTime($this->createAt);
    }

    /**
     * @from-db create_at
     * @param string $createAt
     * @return self
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * @return self
     */
    public function setCreateAtToNow()
    {
        $this->createAt = date('Y-m-d H:i:s');

        return $this;
    }

    /**
     * @to-db text
     * @extract
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @from-db text
     * @hydrate
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return UserRecordInterface
     * @throws \Exception
     */
    public function getUser()
    {
        if (!($this->user instanceof UserRecordInterface)) {
            $this->user = $this->getRelatedRecord(UserRecord::class);
        }

        return $this->user;
    }

    /**
     * @return PostRecordInterface
     * @throws \Exception
     */
    public function getPost()
    {
        if (!($this->post instanceof PostRecordInterface)) {
            $this->post = $this->getRelatedRecord(PostRecord::class);
        }

        return $this->post;
    }
}