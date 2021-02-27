<?php

namespace Blog\RDB\ORM\Post;

use GI\RDB\ORM\Set\AbstractSet as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Set extends Base implements SetInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return RecordInterface
     */
    protected function createTemplateItem()
    {
        return new Record();
    }

    /**
     * @param array $conditions
     * @return self
     * @throws \Exception
     */
    public function search(array $conditions = [])
    {
        $this->hydrateFromDB($this->blogGetRDBDALFactory()->getPostDAL()->search($conditions));

        return $this;
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
        $result = parent::getFirst();

        return $result;
    }

    /**
     * @return RecordInterface
     * @throws \Exception
     */
    public function getLast()
    {
        /** @var RecordInterface $result */
        $result = parent::getLast();

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