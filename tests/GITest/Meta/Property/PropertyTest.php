<?php

namespace GITest\Meta\Property;

use PHPUnit\Framework\TestCase;
use GI\Meta\Property\Property;
use GITest\Meta\Fake\Fake;

class PropertyTest extends TestCase
{
    const NAME = 'p1';

    const VALUE = -1;

    const DESCRIPTOR = 'test-descriptor';

    const DESCRIPTOR_VALUE = 'test';


    /**
     * @var \ReflectionProperty
     */
    private $reflectionProperty;

    /**
     * @var Property
     */
    private $property;



    /**
     * @return self
     * @throws \ReflectionException
     */
    protected function setUp()
    {
        $reflectionClass = new \ReflectionClass(Fake::class);

        $this->reflectionProperty = $reflectionClass->getProperty(static::NAME);

        $this->property = $this->createProperty();

        return $this;
    }

    protected function createProperty()
    {
        return new Property($this->reflectionProperty);
    }

    public function testConstruct()
    {
        $this->assertAttributeEquals($this->reflectionProperty, 'reflection', $this->property);
    }

    public function testGetReflection()
    {
        $this->assertEquals($this->reflectionProperty, $this->property->getReflection());
    }

    public function testGetName()
    {
        $this->assertEquals(static::NAME, $this->property->getName());
    }

    public function testGetClass()
    {
        $this->assertEquals(Fake::class, $this->property->getClass());
    }

    public function testGetValue()
    {
        $dummy = new Fake();

        $this->assertEquals(static::VALUE, $this->property->getValue($dummy));
    }

    /**
     * @throws \ReflectionException
     */
    public function testSetValue()
    {
        $property = $this->createProperty();

        $dummy = new Fake();

        $property->setValue($dummy, 1);
        $this->assertAttributeEquals(1, static::NAME, $dummy);

        $reflectionClass = new \ReflectionClass(Fake::class);
        $reflectionProperty = $reflectionClass->getProperty('p3');
        $property = new Property($reflectionProperty);
        $property->setValue(null, 1);
        $this->assertAttributeEquals(1, 'p3', Fake::class);
    }

    public function testHasDescriptor()
    {
        $this->assertTrue($this->property->hasDescriptor(static::DESCRIPTOR));
        $this->assertFalse($this->property->hasDescriptor(static::DESCRIPTOR . '-'));
    }

    public function testGetDescriptor()
    {
        $this->assertEquals(
            static::DESCRIPTOR_VALUE, $this->property->getDescriptor(static::DESCRIPTOR)
        );
    }
}