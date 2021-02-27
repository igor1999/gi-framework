<?php

namespace Chat\RDB\ORM\Socket;

use GI\RDB\ORM\Record\AbstractRecord as Base;
use Chat\RDB\ORM\User\Record as UserRecord;
use Chat\RDB\ORM\Demon\Record as DemonRecord;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;
use Chat\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Chat\RDB\ORM\Demon\RecordInterface as DemonRecordInterface;

class Record extends Base implements RecordInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var string
     */
    private $demonName = '';

    /**
     * @var string
     */
    private $socketId = '';

    /**
     * @var int
     */
    private $userId = 0;

    /**
     * @var UserRecordInterface
     */
    private $user;

    /**
     * @var DemonRecordInterface
     */
    private $demon;

    /**
     * @var SetInterface
     */
    private $siblings;

    /**
     * @var SetInterface
     */
    private $otherSiblings;


    /**
     * @return DBTableInterface
     */
    public function getTable()
    {
        return $this->chatGetRDBDriverFactory()->getMain()->getSocket();
    }

    /**
     * Chat\RDB\ORM\Demon\Record name
     * Chat\RDB\ORM\Socket\Set demon
     * @to-db demon
     * @return string
     */
    public function getDemonName()
    {
        return $this->demonName;
    }

    /**
     * @from-db demon
     * @param string $demonName
     * @return self
     */
    public function setDemonName(string $demonName)
    {
        $this->demonName = $demonName;

        return $this;
    }

    /**
     * @to-db socket_id
     * @return string
     */
    public function getSocketId()
    {
        return $this->socketId;
    }

    /**
     * @from-db socket_id
     * @param string $socketId
     * @return self
     */
    public function setSocketId(string $socketId)
    {
        $this->socketId = $socketId;

        return $this;
    }

    /**
     * Chat\RDB\ORM\User\Record id
     * @to-db user_id
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @from-db user_id
     * @param int $userId
     * @return self
     */
    public function setUserId($userId)
    {
        $this->userId = (int)$userId;

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
     * @return DemonRecordInterface
     * @throws \Exception
     */
    public function getDemon()
    {
        if (!($this->demon instanceof DemonRecordInterface)) {
            $this->demon = $this->getRelatedRecord(DemonRecord::class);
        }

        return $this->demon;
    }

    /**
     * @return SetInterface
     * @throws \Exception
     */
    public function getSiblings()
    {
        if (!($this->siblings instanceof SetInterface)) {
            $this->siblings = $this->getRelatedSet(Set::class);
        }

        return $this->siblings;
    }

    /**
     * @return SetInterface
     * @throws \Exception
     */
    public function getOtherSiblings()
    {
        if (!($this->otherSiblings instanceof SetInterface)) {
            $this->otherSiblings = $this->chatGetRDBORMFactory()->createSocketSet()->selectOtherSiblings(
                $this->demonName, $this->socketId
            );
        }

        return $this->otherSiblings;
    }
}