<?php

namespace Chat\RDB\ORM\Socket;

use GI\SocketDemon\Exchange\Response\ORM\SocketRecordInterface as BaseInterface;
use Chat\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Chat\RDB\ORM\Demon\RecordInterface as DemonRecordInterface;

interface RecordInterface extends BaseInterface
{
    /**
     * @return string
     */
    public function getDemonName();

    /**
     * @param string $demonName
     * @return self
     */
    public function setDemonName(string $demonName);

    /**
     * @param string $socketId
     * @return self
     */
    public function setSocketId(string $socketId);

    /**
     * @return int
     */
    public function getUserId();

    /**
     * @param int $userId
     * @return self
     */
    public function setUserId($userId);

    /**
     * @return UserRecordInterface
     * @throws \Exception
     */
    public function getUser();

    /**
     * @return DemonRecordInterface
     * @throws \Exception
     */
    public function getDemon();
}