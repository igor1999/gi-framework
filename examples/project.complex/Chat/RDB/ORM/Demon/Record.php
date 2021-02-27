<?php

namespace Chat\RDB\ORM\Demon;

use GI\RDB\ORM\Record\AbstractRecord as Base;
use Chat\RDB\ORM\Socket\Set as SocketSet;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\RDB\Meta\Table\TableInterface as DBTableInterface;
use Chat\RDB\ORM\Socket\SetInterface as SocketSetInterface;

class Record extends Base implements RecordInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var int
     */
    private $stop = 0;

    /**
     * @var SocketSetInterface
     */
    private $sockets;


    /**
     * @return DBTableInterface
     */
    public function getTable()
    {
        return $this->chatGetRDBDriverFactory()->getMain()->getDemon();
    }

    /**
     * Chat\RDB\ORM\Socket\Set demon
     * @to-db name
     * @extract
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @from-db name
     * @hydrate
     * @param string $name
     * @return self
     */
    protected function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @to-db description
     * @extract
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @from-db description
     * @hydrate
     * @param string $description
     * @return self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @to-db stop
     * @extract
     * @return int
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * @from-db stop
     * @hydrate
     * @param int $stop
     * @return self
     */
    public function setStop($stop)
    {
        $this->stop = (int)$stop;

        return $this;
    }

    /**
     * @return SocketSetInterface
     * @throws \Exception
     */
    public function getSockets()
    {
        if (!($this->sockets instanceof SocketSetInterface)) {
            $this->sockets = $this->getRelatedSet(SocketSet::class);
        }

        return $this->sockets;
    }
}