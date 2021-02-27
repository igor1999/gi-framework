<?php

namespace Blog\RDB\ORM\User;

use GI\RDB\ORM\Set\AbstractSet as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

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
    public function get($index)
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
     * @param string $order
     * @param bool $direction
     * @return self
     * @throws \Exception
     */
    public function loadStat($order, $direction)
    {
        $this->hydrateFromDB($this->blogGetRDBDALFactory()->getUserDAL()->getStatisticTotal($order, $direction));

        return $this;
    }
}