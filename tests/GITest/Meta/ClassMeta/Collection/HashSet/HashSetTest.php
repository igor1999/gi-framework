<?php

namespace GITest\Meta\ClassMeta\Collection\HashSet;

use GI\Exception\NotInScope as NotInScopeException;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\ClassMeta;
use GI\Meta\ClassMeta\Collection\Alterable;
use GITest\Meta\Fake\Hierarchy\Member1;
use GITest\Meta\Fake\Hierarchy\Member2;
use GITest\Meta\Fake\Hierarchy\Member3;
use GITest\Meta\Fake\Hierarchy\Member4;
use GITest\Meta\Fake\Hierarchy\Member5;
use GITest\Meta\Fake\Fake;
use GITest\Meta\Fake\AbstractFake;
use GITest\Meta\Fake\FakeInterface;
use GITest\Meta\Fake\FakeTrait;

class HashSetTest extends TestCase
{
    /**
     * @var ClassMeta[]
     */
    private $items = [];

    /**
     * @var Alterable
     */
    private $hashSet;


    /**
     * @return self
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->items = [
            Member1::class => $this->createClassMeta(Member1::class),
            Member2::class => $this->createClassMeta(Member2::class),
            Member3::class => $this->createClassMeta(Member3::class),

            FakeTrait::class     => $this->createClassMeta(FakeTrait::class),
            FakeInterface::class => $this->createClassMeta(FakeInterface::class),
            AbstractFake::class  => $this->createClassMeta(AbstractFake::class),

            Member4::class => $this->createClassMeta(Member4::class),
            Member5::class => $this->createClassMeta(Member5::class),
        ];

        $this->hashSet = $this->createHashSet($this->items);

        return $this;
    }

    /**
     * @param string $class
     * @return ClassMeta
     * @throws \Exception
     */
    protected function createClassMeta($class)
    {
        return new ClassMeta($class);
    }

    /**
     * @param array $items
     * @return Alterable
     * @throws \Exception
     */
    protected function createHashSet(array $items = [])
    {
        return new Alterable($items);
    }

    /**
     * @throws \Exception
     */
    public function testConstruct()
    {
        $contents = [$this->items[Member1::class], Member2::class];

        $hashSet = $this->createHashSet($contents);

        $this->assertAttributeEquals(
            [
                Member1::class => $this->items[Member1::class],
                Member2::class => $this->items[Member2::class],
            ],
            'items',
            $hashSet
        );
    }

    public function testHas()
    {
        $this->assertTrue($this->hashSet->has(Member1::class));
        $this->assertFalse($this->hashSet->has(Fake::class));
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals($this->items[Member1::class], $this->hashSet->get(Member1::class));

        $this->expectException(NotInScopeException::class);
        $this->hashSet->get(Fake::class);
    }

    /**
     * @throws \Exception
     */
    public function testGetFirst()
    {
        $this->assertEquals($this->items[Member1::class], $this->hashSet->getFirst());

        $hashSet = $this->createHashSet();
        $this->expectException(NotInScopeException::class);
        $hashSet->getFirst();
    }

    /**
     * @throws \Exception
     */
    public function testGetLast()
    {
        $this->assertEquals($this->items[Member5::class], $this->hashSet->getLast());

        $hashSet = $this->createHashSet();
        $this->expectException(NotInScopeException::class);
        $hashSet->getLast();
    }

    public function testGetItems()
    {
        $this->assertEquals($this->items, $this->hashSet->getItems());
    }

    public function testGetLength()
    {
        $this->assertEquals(count($this->items), $this->hashSet->getLength());
    }

    /**
     * @throws \Exception
     */
    public function testIsEmpty()
    {
        $hashSet = $this->createHashSet();
        $this->assertTrue($hashSet->isEmpty());

        $this->assertFalse($this->hashSet->isEmpty());
    }

    public function testFilter()
    {
        $f = function(ClassMeta $item)
        {
            return $item->getName() == Member1::class;
        };

        $this->assertEquals([Member1::class => $this->items[Member1::class]], $this->hashSet->filter($f));
    }

    public function testFindParents()
    {
        $this->assertEquals(
            [
                Member2::class => $this->items[Member2::class],
            ],
            $this->hashSet->findParents($this->items[Member3::class])
        );
    }

    public function testFindChildren()
    {
        $this->assertEquals(
            [
                Member4::class => $this->items[Member4::class],
            ],
            $this->hashSet->findChildren($this->items[Member3::class])
        );
    }

    public function testFindDescendants()
    {
        $this->assertEquals(
            [
                Member1::class => $this->items[Member1::class],
                Member2::class => $this->items[Member2::class],
            ],
            $this->hashSet->findDescendants($this->items[Member3::class])
        );
    }

    public function testFindAscendants()
    {
        $this->assertEquals(
            [
                Member4::class => $this->items[Member4::class],
                Member5::class => $this->items[Member5::class],
            ],
            $this->hashSet->findAscendants($this->items[Member3::class])
        );
    }

    public function testFindImplementations()
    {
        $this->assertEquals(
            [
                Member3::class => $this->items[Member3::class],
                Member4::class => $this->items[Member4::class],
                Member5::class => $this->items[Member5::class],
            ],
            $this->hashSet->findImplementations($this->items[Member3::class])
        );
    }

    public function testFindByImplementation()
    {
        $this->assertEquals(
            [
                Member1::class => $this->items[Member1::class],
                Member2::class => $this->items[Member2::class],
                Member3::class => $this->items[Member3::class],
            ],
            $this->hashSet->findByImplementation($this->items[Member3::class])
        );
    }

    public function testFindClasses()
    {
        $this->assertEquals(
            [
                Member1::class => $this->items[Member1::class],
                Member2::class => $this->items[Member2::class],
                Member3::class => $this->items[Member3::class],

                AbstractFake::class  => $this->items[AbstractFake::class],

                Member4::class => $this->items[Member4::class],
                Member5::class => $this->items[Member5::class],
            ],
            $this->hashSet->findClasses()
        );
    }

    public function testFindAbstractClasses()
    {
        $this->assertEquals(
            [AbstractFake::class => $this->items[AbstractFake::class]], $this->hashSet->findAbstractClasses()
        );
    }

    public function testFindTraits()
    {
        $this->assertEquals(
            [FakeTrait::class => $this->items[FakeTrait::class]], $this->hashSet->findTraits()
        );
    }

    public function testFindInterfaces()
    {
        $this->assertEquals(
            [FakeInterface::class => $this->items[FakeInterface::class]], $this->hashSet->findInterfaces()
        );
    }

    /**
     * @throws \Exception
     */
    public function testSet()
    {
        $hashSet = $this->createHashSet();
        $hashSet->set($this->items[Member1::class]);

        $this->assertAttributeEquals(
            [Member1::class => $this->items[Member1::class]], 'items', $hashSet
        );
    }

    /**
     * @throws \Exception
     */
    public function testSetByName()
    {
        $hashSet = $this->createHashSet();
        $hashSet->setByName(Member1::class);

        $this->assertAttributeEquals(
            [Member1::class => $this->items[Member1::class]], 'items', $hashSet
        );
    }

    /**
     * @throws \Exception
     */
    public function testMerge()
    {
        $items1 = [$this->items[Member1::class], $this->items[Member2::class]];
        $items2 = [$this->items[Member2::class], $this->items[Member3::class]];

        $hashSet1 = $this->createHashSet($items1);
        $hashSet2 = $this->createHashSet($items2);

        $hashSet1->merge($hashSet2);

        $this->assertAttributeEquals(
            [
                Member1::class => $this->items[Member1::class],
                Member2::class => $this->items[Member2::class],
                Member3::class => $this->items[Member3::class]
            ],
            'items',
            $hashSet1
        );
    }

    /**
     * @throws \Exception
     */
    public function testRemove()
    {
        $hashSet = $this->createHashSet([$this->items[Member1::class], $this->items[Member2::class]]);

        $this->assertTrue($hashSet->remove(Member2::class));
        $this->assertFalse($hashSet->remove(Member3::class));

        $this->assertAttributeEquals(
            [Member1::class => $this->items[Member1::class]],
            'items',
            $hashSet
        );
    }

    /**
     * @throws \Exception
     */
    public function testClean()
    {
        $hashSet = $this->createHashSet($this->items);
        $hashSet->clean();

        $this->assertAttributeEquals([], 'items', $hashSet);
    }
}