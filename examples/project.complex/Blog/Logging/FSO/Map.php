<?php

namespace Blog\Logging\FSO;

use GI\FileSystem\FSO\FSOFile\Collection\HashSet\HashSet;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\FileSystem\FSO\FSODir\FSODirInterface;

class Map extends HashSet implements MapInterface
{
    use ServiceLocatorAwareTrait;


    const DB_POST    = 'db-post';

    const DB_COMMENT = 'db-comment';


    /**
     * Map constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $baseDir = $this->createBaseDir();

        $this->set(static::DB_POST, $baseDir->createChildFile('db-actions/post.txt'))
            ->set(static::DB_COMMENT, $baseDir->createChildFile('db-actions/comment.txt'));
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