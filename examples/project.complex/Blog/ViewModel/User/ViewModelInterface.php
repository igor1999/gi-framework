<?php

namespace Blog\ViewModel\User;

use GI\ViewModel\ViewModelInterface as BaseInterface;

/**
 * Interface ViewModelInterface
 * @package Blog\ViewModel\User
 *
 * @method getLoginName()
 * @method getEmailName()
 */
interface ViewModelInterface extends BaseInterface
{
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
}