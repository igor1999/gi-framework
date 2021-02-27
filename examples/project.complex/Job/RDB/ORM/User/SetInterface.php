<?php

namespace Job\RDB\ORM\User;

use GI\RDB\ORM\Set\SetInterface as BaseInterface;

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
}