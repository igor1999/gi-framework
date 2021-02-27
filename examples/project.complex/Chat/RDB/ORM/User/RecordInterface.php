<?php

namespace Chat\RDB\ORM\User;

use GI\RDB\ORM\Record\RecordInterface as BaseInterface;
use Chat\RDB\ORM\Socket\SetInterface as SocketSetInterface;

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

    /**
     * @return SocketSetInterface
     * @throws \Exception
     */
    public function getSockets();

    /**
     * @param string $demon
     * @return SocketSetInterface
     * @throws \Exception
     */
    public function getDemonSockets(string $demon);
}