<?php

namespace Blog\Component\Post\Search\ViewModel;

use Blog\ViewModel\Post\AbstractViewModel;
use Blog\Component\Post\Search\ViewModel\Filter\Filter;
use GI\RDB\ORM\Record\AbstractRecord;

use GI\ViewModel\Filter\FilterAwareTrait;

use Blog\Component\Post\Search\ViewModel\Filter\FilterInterface;

/**
 * Class Post
 * @package Blog\Component\Post\Search\ViewModel
 *
 * @method array getFromName()
 * @method string renderFromName()
 * @method array getTillName()
 * @method string renderTillName()
 */
class Post extends AbstractViewModel implements PostInterface
{
    use FilterAwareTrait;


    const USER_NAME = 'user';


    const SESSION_HYDRATION_DESCRIPTOR  = 'session-hydrate';

    const SESSION_EXTRACTION_DESCRIPTOR = 'session-extract';

    const DB_EXTRACTION_DESCRIPTOR      = AbstractRecord::DB_EXTRACTION_DESCRIPTOR;


    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $till;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var FilterInterface
     */
    private $filter;


    /**
     * Post constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->filter = $this->giGetDi(FilterInterface::class, Filter::class);

        $this->user = $this->giGetDi(UserInterface::class, User::class);
        $this->user->setViewModelParent($this)->setViewModelName(static::USER_NAME);
    }

    /**
     * @extract
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getFromAsDate()
    {
        return new \DateTime($this->from);
    }

    /**
     * @hydrate
     * @param string $from
     * @return self
     */
    protected function setFrom(string $from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @extract
     * @return string
     */
    public function getTill()
    {
        return $this->till;
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getTillAsDate()
    {
        return new \DateTime($this->till);
    }

    /**
     * @hydrate
     * @param string $till
     * @return self
     */
    protected function setTill(string $till)
    {
        $this->till = $till;

        return $this;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @hydrate
     * @param array $user
     * @return self
     * @throws \Exception
     */
    protected function setUser($user)
    {
        if (!is_array($user)) {
            $this->giThrowInvalidTypeException('User data', '', 'array');
        }

        $this->getUser()->hydrate($user);

        return $this;
    }

    /**
     * @to-db
     * @session-extract
     * @return string
     */
    protected function getLogin()
    {
        return $this->getUser()->getLogin();
    }

    /**
     * @session-hydrate
     * @param string $login
     * @return $this
     */
    protected function setLogin(string $login)
    {
        $this->getUser()->setLogin($login);

        return $this;
    }

    /**
     * @return FilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function extractToDB()
    {
        return array_merge(
            $this->extract(),
            $this->giGetClassMeta()->extract($this, static::DB_EXTRACTION_DESCRIPTOR)
        );
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function extractToSession()
    {
        return array_merge(
            $this->extract(),
            $this->giGetClassMeta()->extract($this, static::SESSION_EXTRACTION_DESCRIPTOR)
        );
    }

    /**
     * @param array $contents
     * @return self
     * @throws \Exception
     */
    public function hydrateFromSession(array $contents)
    {
        $this->hydrate($contents);

        $this->giGetClassMeta()->hydrate($this, $contents, static::SESSION_HYDRATION_DESCRIPTOR);

        return $this;
    }
}