<?php

namespace Blog\RDB\ORM\User;

use GI\RDB\ORM\Set\SetInterface as BaseInterface;

interface SetInterface extends BaseInterface
{
    /**
     * @param int $index
     * @return RecordInterface
     * @throws \Exception
     */
    public function get($index);

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
     * @param string $order
     * @param bool $direction
     * @return self
     * @throws \Exception
     */
    public function loadStat($order, $direction);
}