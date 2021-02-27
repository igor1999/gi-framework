<?php

namespace Blog\ViewModel\User;

use GI\ViewModel\AbstractViewModel as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

/**
 * Class AbstractViewModel
 * @package Blog\ViewModel\User
 *
 * @method getLoginName()
 * @method getEmailName()
 */
abstract class AbstractViewModel extends Base implements ViewModelInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $email;


    /**
     * @extract
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
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
     * @extract
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @hydrate
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}