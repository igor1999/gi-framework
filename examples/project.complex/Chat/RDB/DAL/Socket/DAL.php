<?php

namespace Chat\RDB\DAL\Socket;

use Chat\ServiceLocator\ServiceLocatorIntegralTrait;

class DAL implements DALInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @param int $userId
     * @param string $demon
     * @return array[]
     */
    public function getUserDemonSockets(int $userId, string $demon)
    {
        $sql = 'SELECT * FROM {{socket}} WHERE {{user_id}} = :userId AND {{demon}} = :demon';

        return $this->chatGetRDBDriverFactory()->getMain()->fetchAll($sql, ['userId' => $userId, 'demon' => $demon]);
    }

    /**
     * @param string $demon
     * @param string $socketId
     * @return array[]
     */
    public function getOtherSiblings(string $demon, string $socketId)
    {
        $sql = 'SELECT * FROM {{socket}} WHERE {{demon}} = :demon AND {{socket_id}} <> :socketId';

        return $this->chatGetRDBDriverFactory()->getMain()->fetchAll(
            $sql, ['demon' => $demon, 'socketId' => $socketId]
        );
    }
}