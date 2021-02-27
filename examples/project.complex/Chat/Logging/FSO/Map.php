<?php

namespace Chat\Logging\FSO;

use GI\FileSystem\FSO\FSOFile\Collection\HashSet\HashSet;
use GI\SocketDemon\Socket\Client\Collection\Collection as SocketCollection;
use GI\SocketDemon\Socket\Client\Item\Item as SocketItem;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\FileSystem\FSO\FSODir\FSODirInterface;

class Map extends HashSet implements MapInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Map constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $baseDir = $this->createBaseDir();

        $this->set(SocketCollection::class, $baseDir->createChildFile('socket/conversation/collection.txt'))
            ->set(SocketItem::class, $baseDir->createChildFile('socket/conversation/item.txt'));
    }

    /**
     * @return FSODirInterface
     * @throws \Exception
     */
    protected function createBaseDir()
    {
        return $this->giCreateClassDirChildDir(self::class, '')
            ->createParent()
            ->createChildDir('logs');
    }
}