<?php

namespace Blog\RDB\ORM\User;

use GI\RDB\ORM\Record\AbstractRecord as Base;
use Blog\RDB\ORM\Post\Set as PostSet;
use Blog\RDB\ORM\Comment\Set as CommentSet;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Post\SetInterface as PostSetInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;
use GI\RDB\Meta\Table\TableInterface as DBTableInterface;

class Record extends Base implements RecordInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $passwordHash;

    /**
     * @var string
     */
    private $email;

    /**
     * @var PostSetInterface
     */
    private $posts;

    /**
     * @var CommentSetInterface
     */
    private $comments;

    /**
     * @var int
     */
    private $postsTotal;

    /**
     * @var int
     */
    private $commentsTotal;

    /**
     * @var int
     */
    private $receivedCommentsTotal;


    /**
     * @return DBTableInterface
     */
    public function getTable()
    {
        return $this->blogGetRDBDriverFactory()->getMain()->getUser();
    }

    /**
     * @Blog\RDB\ORM\Post\Set author_id
     * @Blog\RDB\ORM\Comment\Set author_id
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
     * @to-db login
     * @extract
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @from-db login
     * @hydrate
     * @param string $login
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @to-db password
     * @return string
     */
    protected function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @from-db password
     * @param string $passwordHash
     * @return self
     */
    protected function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    /**
     * @to-db email
     * @extract
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @from-db email
     * @hydrate
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return PostSetInterface
     * @throws \Exception
     */
    public function getPosts()
    {
        if (!($this->posts instanceof PostSetInterface)) {
            $this->posts = $this->getRelatedSet(PostSet::class);
        }

        return $this->posts;
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
     * @param string $createAt
     * @return array
     */
    public function getPostsStat($createAt)
    {
        return $this->blogGetRDBDALFactory()->getPostDAL()->getStatByAuthor($this->id, $createAt);
    }

    /**
     * @param string $createAt
     * @return array
     */
    public function getCommentsStat($createAt)
    {
        return $this->blogGetRDBDALFactory()->getCommentDAL()->getStatByAuthor($this->id, $createAt);
    }

    /**
     * @extract
     * @return int
     */
    public function getPostsTotal()
    {
        return $this->postsTotal;
    }

    /**
     * @from-db postsTotal
     * @param int $postsTotal
     * @return self
     */
    protected function setPostsTotal($postsTotal)
    {
        $this->postsTotal = $postsTotal;

        return $this;
    }

    /**
     * @extract
     * @return int
     */
    public function getCommentsTotal()
    {
        return $this->commentsTotal;
    }

    /**
     * @from-db commentsTotal
     * @param int $commentsTotal
     * @return self
     */
    protected function setCommentsTotal($commentsTotal)
    {
        $this->commentsTotal = $commentsTotal;

        return $this;
    }

    /**
     * @extract
     * @return int
     */
    public function getReceivedCommentsTotal()
    {
        return $this->receivedCommentsTotal;
    }

    /**
     * @from-db receivedCommentsTotal
     * @param int $receivedCommentsTotal
     * @return self
     */
    protected function setReceivedCommentsTotal($receivedCommentsTotal)
    {
        $this->receivedCommentsTotal = $receivedCommentsTotal;

        return $this;
    }
}