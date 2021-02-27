<?php

namespace GITest\Meta\Method;

use PHPUnit\Framework\TestCase;
use GI\Meta\Method\Method;
use GITest\Meta\Fake\Fake;

class MethodTest extends TestCase
{
    const NAME = 'singleMethod';

    const STATIC_NAME = 'staticSingleMethod';

    const DESCRIPTOR = 'test-descriptor';

    const DESCRIPTOR_VALUE = 'test';


    /**
     * @var \ReflectionMethod
     */
    private $reflectionMethod;

    /**
     * @var Method
     */
    private $method;



    /**
     * @return self
     * @throws \ReflectionException
     */
    protected function setUp()
    {
        $this->reflectionMethod =$this->createReflectionMethod(static::NAME);

        $this->method = $this->createMethod();

        return $this;
    }

    /**
     * @param string $name
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    protected function createReflectionMethod(string $name)
    {
        $reflectionClass = new \ReflectionClass(Fake::class);

        return $reflectionClass->getMethod($name);
    }

    /**
     * @param string|null $name
     * @return Method
     * @throws \ReflectionException
     */
    protected function createMethod(string $name = null)
    {
        $reflectionMethod = empty($name) ? $this->reflectionMethod : $this->createReflectionMethod($name);

        return new Method($reflectionMethod);
    }

    public function testConstruct()
    {
        $this->assertAttributeEquals($this->reflectionMethod, 'reflection', $this->method);
    }

    public function testGetReflection()
    {
        $this->assertEquals($this->reflectionMethod, $this->method->getReflection());
    }

    public function testGetName()
    {
        $this->assertEquals(static::NAME, $this->method->getName());
    }

    public function testGetClass()
    {
        $this->assertEquals(Fake::class, $this->method->getClass());
    }

    /**
     * @throws \Exception
     */
    public function testExecute()
    {
        $this->assertEquals(1, $this->method->execute(new Fake(), [1]));
        $this->assertEquals(1, $this->createMethod(static::STATIC_NAME)->execute(null, [1]));
    }

    public function testHasDescriptor()
    {
        $this->assertTrue($this->method->hasDescriptor(static::DESCRIPTOR));
        $this->assertFalse($this->method->hasDescriptor(static::DESCRIPTOR . '-'));
    }

    public function testGetDescriptor()
    {
        $this->assertEquals(
            static::DESCRIPTOR_VALUE, $this->method->getDescriptor(static::DESCRIPTOR)
        );
    }
}