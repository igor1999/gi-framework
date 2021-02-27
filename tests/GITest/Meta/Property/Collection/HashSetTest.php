<?php

namespace GITest\Meta\Property\Collection;

use GI\Exception\NotInScope as NotInScopeException;

use PHPUnit\Framework\TestCase;
use GI\Meta\Property\Property;
use GI\Meta\Property\Collection\Alterable;
use GITest\Meta\Fake\Fake;

class HashSetTest extends TestCase
{
    const PROPERTY_1 = 'p1';

    const PROPERTY_2 = 'p2';

    const DESCRIPTOR = 'test-descriptor';

    const DESCRIPTOR_VALUE = 'test';


    /**
     * @var Property
     */
    private $property1;

    /**
     * @var Property
     */
    private $property2;

    /**
     * @var Alterable
     */
    private $hashSet;


    /**
     * @return $this|void
     * @throws \ReflectionException
     */
    protected function setUp()
    {
        $this->property1 = $this->createProperty(static::PROPERTY_1);
        $this->property2 = $this->createProperty(static::PROPERTY_2);

        $this->hashSet = $this->createHashSet([$this->property1, $this->property2]);

        return $this;
    }

    /**
     * @param string $name
     * @return Property
     * @throws \ReflectionException
     */
    protected function createProperty($name)
    {
        $reflectionClass = new \ReflectionClass(Fake::class);

        $reflectionProperty = $reflectionClass->getProperty($name);

        return new Property($reflectionProperty);
    }

    protected function createHashSet(array $items = [])
    {
        return new Alterable($items);
    }

    public function testHas()
    {
        $this->assertTrue($this->hashSet->has(static::PROPERTY_1));
        $this->assertFalse($this->hashSet->has(static::PROPERTY_1 . '_'));
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals($this->property1, $this->hashSet->get(static::PROPERTY_1));

        $this->expectException(NotInScopeException::class);
        $this->hashSet->get(static::PROPERTY_1 . '_');
    }

    /**
     * @throws \Exception
     */
    public function testGetFirst()
    {
        $this->assertEquals($this->property1, $this->hashSet->getFirst());

        $this->expectException(NotInScopeException::class);
        $this->createHashSet()->getFirst();
    }

    /**
     * @throws \Exception
     */
    public function testGetLast()
    {
        $this->assertEquals($this->property2, $this->hashSet->getLast());

        $this->expectException(NotInScopeException::class);
        $this->createHashSet()->getLast();
    }

    public function testGetItems()
    {
        $this->assertEquals(
            [$this->property1->getName() => $this->property1, $this->property2->getName() => $this->property2],
            $this->hashSet->getItems()
        );
    }

    public function testGetLength()
    {
        $this->assertEquals(2, $this->hashSet->getLength());
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->createHashSet()->isEmpty());
        $this->assertFalse($this->hashSet->isEmpty());
    }

    public function testFilter()
    {
        $f = function(Property $property)
        {
            return $property->getName() == $this->property1->getName();
        };

        $this->assertEquals(
            [$this->property1->getName() => $this->property1],
            $this->hashSet->filter($f)
        );
    }

    public function testFindByDescriptorName()
    {
        $this->assertEquals(
            [$this->property1->getName() => $this->property1],
            $this->hashSet->findByDescriptorName(static::DESCRIPTOR)
        );
    }

    /**
     * @throws \Exception
     */
    public function testFindOneByDescriptorName()
    {
        $this->assertEquals($this->property1, $this->hashSet->findOneByDescriptorName(static::DESCRIPTOR));
    }

    public function testFindByDescriptorValue()
    {
        $this->assertEquals(
            [$this->property1->getName() => $this->property1],
            $this->hashSet->findByDescriptorValue(static::DESCRIPTOR, static::DESCRIPTOR_VALUE)
        );
    }

    /**
     * @throws \Exception
     */
    public function testFindOneByDescriptorValue()
    {
        $this->assertEquals(
            $this->property1,
            $this->hashSet->findOneByDescriptorValue(static::DESCRIPTOR, static::DESCRIPTOR_VALUE)
        );
    }

    public function testSet()
    {
        $hashSet = $this->createHashSet();
        $hashSet->set($this->property1);

        $this->assertAttributeEquals(
            [$this->property1->getName() => $this->property1], 'items', $hashSet
        );
    }

    public function testRemove()
    {
        $hashSet = $this->createHashSet([$this->property1, $this->property2]);
        $hashSet->remove(static::PROPERTY_2);

        $this->assertAttributeEquals(
            [$this->property1->getName() => $this->property1], 'items', $hashSet
        );
    }

    public function testClean()
    {
        $hashSet = $this->createHashSet([$this->property1, $this->property2]);
        $hashSet->clean();

        $this->assertAttributeEquals([], 'items', $hashSet);
    }
}