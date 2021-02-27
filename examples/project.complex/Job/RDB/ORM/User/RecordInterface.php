<?php

namespace Job\RDB\ORM\User;

use GI\RDB\ORM\Record\RecordInterface as BaseInterface;

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
    public function setLogin(string $login);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email);
}