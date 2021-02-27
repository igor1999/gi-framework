<?php

namespace Chat\RDB\ORM\Demon;

use GI\SocketDemon\Exchange\Response\ORM\DemonRecordInterface as BaseInterface;

interface RecordInterface extends BaseInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description);

    /**
     * @return int
     */
    public function getStop();

    /**
     * @param int $stop
     * @return self
     */
    public function setStop($stop);
}