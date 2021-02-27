<?php

namespace Chat\RDB\ORM\Socket;

use GI\SocketDemon\Exchange\Response\ORM\SocketSetInterface as BaseInterface;

interface SetInterface extends BaseInterface
{
    /**
     * @param int $index
     * @return RecordInterface
     * @throws \Exception
     */
    public function get(int $index);

    /**
     * @return RecordInterface
     * @throws \Exception
     */
    public function getFirst();

    /**
     * @return RecordInterface
     * @throws \Exception
     */
    public function getLast();

    /**
     * @return RecordInterface[]
     * @throws \Exception
     */
    public function getItems();

    /**
     * @param int $userId
     * @param string $demon
     * @return self
     * @throws \Exception
     */
    public function selectByUserAndDemon(int $userId, string $demon);

    /**
     * @param string $demon
     * @param string $socketId
     * @return self
     * @throws \Exception
     */
    public function selectOtherSiblings(string $demon, string $socketId);
}