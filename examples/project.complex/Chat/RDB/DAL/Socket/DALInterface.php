<?php

namespace Chat\RDB\DAL\Socket;

interface DALInterface
{
    /**
     * @param int $userId
     * @param string $demon
     * @return array[]
     */
    public function getUserDemonSockets(int $userId, string $demon);

    /**
     * @param string $demon
     * @param string $socketId
     * @return array[]
     */
    public function getOtherSiblings(string $demon, string $socketId);
}