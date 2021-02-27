<?php

namespace Chat\RDB\ORM\User;

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
}