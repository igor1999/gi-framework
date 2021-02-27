<?php

namespace GITest\Storage\Tree;

use GI\Exception\NotInScope as NotInScopeException;

use PHPUnit\Framework\TestCase;
use GI\Storage\Tree\Tree;

class TreeTest extends TestCase
{
    /**
     * @var Tree
     */
    private $tree;


    /**
     * @return self
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->tree = $this->createTreeWithStructure();

        return $this;
    }

    /**
     * @param array $items
     * @return Tree
     * @throws \Exception
     */
    protected function createTree(array $items = [])
    {
        return new Tree($items);
    }

    protected function getStructure()
    {
        return [
            'node-0' => 'value-0',
            'node-1' => [
                'node-1-0' => 'value-1-0',
                'node-1-1' => 'value-1-1',
                'node-1-2' => 'value-1-2',
            ],
            'node-2' => 'value-2',
        ];
    }

    /**
     * @return Tree
     * @throws \Exception
     */
    protected function createTreeWithStructure()
    {
        return $this->createTree($this->getStructure());
    }

    /**
     * @throws \Exception
     */
    public function testHas()
    {
        $this->assertTrue($this->tree->has('node-0'));
        $this->assertFalse($this->tree->has('node-55'));
        $this->assertTrue($this->tree->has(['node-1', 'node-1-0']));
        $this->assertFalse($this->tree->has(['node-55', 'node-1-0']));
        $this->assertFalse($this->tree->has(['node-1', 'node-1-55']));
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals('value-0', $this->tree->get('node-0'));
        $this->assertInstanceOf(Tree::class, $this->tree->get('node-1'));
        $this->assertEquals('value-1-0', $this->tree->get(['node-1', 'node-1-0']));

        $this->expectException(NotInScopeException::class);
        $this->tree->get(['node-55', 'node-1-0']);
    }

    /**
     * @throws \Exception
     */
    public function testGet2()
    {
        $this->expectException(NotInScopeException::class);
        $this->tree->get(['node-0', 'node-0-0']);
    }

    public function testGetOptional()
    {
        $this->assertEquals('value-0', $this->tree->getOptional('node-0'));
        $this->assertNull($this->tree->getOptional('node-55'));
    }

    /**
     * @throws \Exception
     */
    public function testGetNodes()
    {
        $this->assertEquals(
            [
                'node-1-0' => 'value-1-0',
                'node-1-1' => 'value-1-1',
                'node-1-2' => 'value-1-2',
            ],
            $this->tree->get('node-1')->getNodes()
        );
    }

    public function testGetLength()
    {
        $this->assertEquals(3, $this->tree->getLength());
    }

    /**
     * @throws \Exception
     */
    public function testIsEmpty()
    {
        $this->assertTrue($this->createTree()->isEmpty());
        $this->assertFalse($this->tree->isEmpty());
    }

    public function testFindKey()
    {
        $this->assertEquals(['node-1', 'node-1-0'], $this->tree->findKey('value-1-0'));
        $this->assertFalse($this->tree->findKey('value-55'));
    }

    public function testIsElementExists()
    {
        $this->assertTrue($this->tree->contains('value-1-0'));
        $this->assertFalse($this->tree->contains('value-55'));
    }

    /**
     * @throws \Exception
     */
    public function testExtract()
    {
        $this->assertEquals($this->getStructure(), $this->tree->extract());
    }

    /**
     * @throws \Exception
     */
    public function testSet()
    {
        $tree = $this->createTreeWithStructure();

        $tree->set(['node-1', 'node-1-3'], ['node-1-3-0' => 'value-1-3-0']);

        $this->assertInstanceOf(Tree::class, $tree->get(['node-1', 'node-1-3']));
        $this->assertEquals(['node-1-3-0' => 'value-1-3-0'],  $tree->get(['node-1', 'node-1-3'])->getNodes());
    }

    /**
     * @throws \Exception
     */
    public function testRemove()
    {
        $tree = $this->createTreeWithStructure();

        $this->assertFalse($tree->remove('node-55'));
        $this->assertFalse($tree->remove(['node-1', 'node-1-55']));

        $this->assertTrue($tree->remove('node-2'));
        $this->assertEquals(
            [
                'node-0' => 'value-0',
                'node-1' => [
                    'node-1-0' => 'value-1-0',
                    'node-1-1' => 'value-1-1',
                    'node-1-2' => 'value-1-2',
                ],
            ],
            $tree->extract()
        );

        $tree = $this->createTreeWithStructure();

        $this->assertTrue($tree->remove(['node-1', 'node-1-2']));
        $this->assertEquals(
            [
                'node-0' => 'value-0',
                'node-1' => [
                    'node-1-0' => 'value-1-0',
                    'node-1-1' => 'value-1-1',
                ],
                'node-2' => 'value-2',
            ],
            $tree->extract()
        );
    }

    /**
     * @throws \Exception
     */
    public function testClose()
    {
        $tree = $this->createTreeWithStructure();

        $this->assertFalse($tree->isClosed());
        $this->assertFalse($tree->get('node-1')->isClosed());

        $tree->close();
        $this->assertTrue($tree->isClosed());
        $this->assertTrue($tree->get('node-1')->isClosed());
    }
}