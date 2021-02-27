<?php

namespace Blog\RDB\ORM\Post;

use GI\RDB\ORM\Record\AbstractRecord as Base;
use Blog\RDB\ORM\Comment\Set as CommentSet;
use Blog\RDB\ORM\User\Record as UserRecord;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;
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
     * @var string
     */
    private $createAt;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $text;

    /**
     * @var UserRecordInterface
     */
    private $user;

    /**
     * @var CommentSetInterface
     */
    private $comments;

    /**
     * @var int
     */
    private $commentsCount;


    /**
     * Post constructor.
     * @param int|null $primary
     * @throws \Exception
     */
    public function __construct($primary = null)
    {
        parent::__construct($primary);

        if (empty($this->createAt)) {
            $this->setCreateAtToNow();
        }
    }

    /**
     * @return DBTableInterface
     */
    public function getTable()
    {
        return $this->blogGetRDBDriverFactory()->getMain()->getPost();
    }

    /**
     * @Blog\RDB\ORM\Comment\Set post_id
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
     * @to-db title
     * @extract
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @from-db title
     * @hydrate
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * @return CommentSetInterface
     * @throws \Exception
     */
    public function getComments()
    {
        if (!($this->comments instanceof CommentSetInterface)) {
            $this->comments = $this->getRelatedSet(CommentSet::class);
        }

        return $this->comments;
    }

    /**
     * @return int
     */
    public function getCommentsCount()
    {
        if (!is_numeric($this->commentsCount)) {
            $this->commentsCount = $this->blogGetRDBDALFactory()->getCommentDAL()->countByPost($this->id);
        }

        return $this->commentsCount;
    }

    /**
     * @from-db comments_count
     * @param int $commentsCount
     * @return self
     */
    protected function setCommentsCount($commentsCount)
    {
        $this->commentsCount = $commentsCount;

        return $this;
    }
}