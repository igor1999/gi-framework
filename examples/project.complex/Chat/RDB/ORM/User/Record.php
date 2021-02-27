<?php

namespace Chat\RDB\ORM\User;

use GI\RDB\ORM\Record\AbstractRecord as Base;
use Chat\RDB\ORM\Socket\Set as SocketSet;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;
use Chat\RDB\ORM\Socket\SetInterface as SocketSetInterface;

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
    private $login = '';

    /**
     * @var string
     */
    private $passwordHash = '';

    /**
     * @var string
     */
    private $email = '';

    /**
     * @var SocketSetInterface
     */
    private $sockets;

    /**
     * @var SocketSetInterface[]
     */
    private $demonSockets = [];


    /**
     * @return DBTableInterface
     */
    public function getTable()
    {
        return $this->chatGetRDBDriverFactory()->getMain()->getUser();
    }

    /**
     * Chat\RDB\ORM\Socket\Set user_id
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
    public function setLogin(string $login)
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
    protected function setPasswordHash(string $passwordHash)
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
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return SocketSetInterface
     * @throws \Exception
     */
    public function getSockets()
    {
        if (!($this->sockets instanceof SocketSetInterface)) {
            $this->sockets = $this->getRelatedSet(SocketSet::class);
        }

        return $this->sockets;
    }

    /**
     * @param string $demon
     * @return SocketSetInterface
     * @throws \Exception
     */
    public function getDemonSockets(string $demon)
    {
        if (!isset($this->demonSockets[$demon])) {
            $this->demonSockets[$demon] = $this->chatGetRDBORMFactory()->createSocketSet()->selectByUserAndDemon(
                $this->id, $demon
            );
        }

        return $this->demonSockets[$demon];
    }
}