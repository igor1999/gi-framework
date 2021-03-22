<?php

namespace Blog\Identity;

use GI\Identity\ArrayIdentity\AbstractIdentity;
use Blog\Identity\I18n\Glossary;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Storage\Tree\TreeInterface;
use Blog\Identity\I18n\GlossaryInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

/**
 * Class Identity
 * @package Blog\Identity
 *
 * @method getEmail()
 */
class Identity extends AbstractIdentity implements IdentityInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var TreeInterface
     */
    private static $sessionCache;


    /**
     * @return TreeInterface
     */
    protected function getSessionCache()
    {
        return self::$sessionCache;
    }

    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    protected function createByCredentials(string $login, string $password)
    {
        return $this->blogGetRDBDALFactory()->getUserDAL()->authenticate($login, $password);
    }

    /**
     * @param int $id
     * @return null
     */
    protected function createByUserID(int $id)
    {
        return [];
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function getID()
    {
        return $this->get('id');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getLogin()
    {
        return $this->get('login');
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return '';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSignature()
    {
        $template = '%s, %s';
        $grating  = $this->giTranslate(GlossaryInterface::class, Glossary::class,'Hello');

        return $this->isAuthenticated() ? sprintf($template, $grating, $this->getLogin()) : '';
    }

    /**
     * @param PostRecordInterface $post
     * @return bool
     * @throws \Exception
     */
    public function allowEditPost(PostRecordInterface $post)
    {
        return $this->isAuthenticated() && ($this->getId() == $post->getAuthorID());
    }

    /**
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function validateEditPost(PostRecordInterface $post)
    {
        if (!$this->allowEditPost($post)) {
            $this->throwIdentityAccessException('Edit post');
        }
    }

    /**
     * @param PostRecordInterface $post
     * @return bool
     * @throws \Exception
     */
    public function allowDeletePost(PostRecordInterface $post)
    {
        return $this->isAuthenticated() && ($this->getId() == $post->getAuthorID());
    }

    /**
     * @param PostRecordInterface $post
     * @throws \Exception
     */
    public function validateDeletePost(PostRecordInterface $post)
    {
        if (!$this->allowDeletePost($post)) {
            $this->throwIdentityAccessException('Delete post');
        }
    }

    /**
     * @param CommentRecordInterface $comment
     * @return bool
     * @throws \Exception
     */
    public function allowDeleteComment(CommentRecordInterface $comment)
    {
        $commentAuthor = $this->isAuthenticated() && ($this->getId() == $comment->getAuthorID());
        $postAuthor    = $this->isAuthenticated() && ($this->getId() == $comment->getPost()->getAuthorID());

        return ($commentAuthor || $postAuthor);
    }

    /**
     * @param CommentRecordInterface $comment
     * @throws \Exception
     */
    public function validateDeleteComment(CommentRecordInterface $comment)
    {
        if (!$this->allowDeleteComment($comment)) {
            $this->throwIdentityAccessException('Delete comment');
        }
    }
}