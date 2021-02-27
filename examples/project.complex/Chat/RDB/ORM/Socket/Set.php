<?php

namespace Chat\RDB\ORM\Socket;

use GI\RDB\ORM\Set\AbstractSet as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Set extends Base implements SetInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return RecordInterface
     * @throws \Exception
     */
    public function createTemplateItem()
    {
        return new Record();
    }

    /**
     * @param int $index
     * @return RecordInterface
     * @throws \Exception
     */
    public function get(int $index)
    {
        /** @var RecordInterface $result */
        $result = parent::get($index);

        return $result;
    }

    /**
     * @return RecordInterface
     * @throws \Exception
     */
    public function getFirst()
    {
        /** @var RecordInterface $result */
        $result =parent::getFirst();

        return $result;
    }

    /**
     * @return RecordInterface
     * @throws \Exception
     */
    public function getLast()
    {
        /** @var RecordInterface $result */
        $result =parent::getLast();

        return $result;
    }

    /**
     * @return RecordInterface[]
     * @throws \Exception
     */
    public function getItems()
    {
        /** @var RecordInterface[] $result */
        $result = parent::getItems();

        return $result;
    }

    /**
     * @param int $userId
     * @param string $demon
     * @return self
     * @throws \Exception
     */
    public function selectByUserAndDemon(int $userId, string $demon)
    {
        $this->hydrateFromDB($this->chatGetRDBDALFactory()->getSocketDAL()->getUserDemonSockets($userId, $demon));

        return $this;
    }

    /**
     * @param string $demon
     * @param string $socketId
     * @return self
     * @throws \Exception
     */
    public function selectOtherSiblings(string $demon, string $socketId)
    {
        $this->hydrateFromDB($this->chatGetRDBDALFactory()->getSocketDAL()->getOtherSiblings($demon, $socketId));

        return $this;
    }
}