<?php

namespace GITest\Meta\Method\Collection;

use GI\Exception\NotInScope as NotInScopeException;
use GI\Exception\NotFound as NotFoundException;

use PHPUnit\Framework\TestCase;
use GI\Meta\Method\Method;
use GI\Meta\Method\Collection\Alterable;
use GITest\Meta\Fake\Fake;

class HashSetTest extends TestCase
{
    const METHOD_1 = 'collectionMethod1';

    const METHOD_2 = 'collectionMethod2';

    const DESCRIPTOR = 'test-descriptor';

    const DESCRIPTOR_VALUE = 'test';


    /**
     * @var Method
     */
    private $method1;

    /**
     * @var Method
     */
    private $method2;

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
        $this->method1 = $this->createMethod(static::METHOD_1);
        $this->method2 = $this->createMethod(static::METHOD_2);

        $this->hashSet = $this->createHashSet([$this->method1, $this->method2]);

        return $this;
    }

    /**
     * @param string $name
     * @return Method
     * @throws \ReflectionException
     */
    protected function createMethod($name)
    {
        $reflectionClass = new \ReflectionClass(Fake::class);

        $reflectionMethod = $reflectionClass->getMethod($name);

        return new Method($reflectionMethod);
    }

    protected function createHashSet(array $items = [])
    {
        return new Alterable($items);
    }

    public function testHas()
    {
        $this->assertTrue($this->hashSet->has(static::METHOD_1));
        $this->assertFalse($this->hashSet->has(static::METHOD_1 . '_'));
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals($this->method1, $this->hashSet->get(static::METHOD_1));

        $this->expectException(NotInScopeException::class);
        $this->hashSet->get(static::METHOD_1 . '_');
    }

    /**
     * @throws \Exception
     */
    public function testGetFirst()
    {
        $this->assertEquals($this->method1, $this->hashSet->getFirst());

        $this->expectException(NotInScopeException::class);
        $this->createHashSet()->getFirst();
    }

    /**
     * @throws \Exception
     */
    public function testGetLast()
    {
        $this->assertEquals($this->method2, $this->hashSet->getLast());

        $this->expectException(NotInScopeException::class);
        $this->createHashSet()->getLast();
    }

    public function testGetItems()
    {
        $this->assertEquals(
            [$this->method1->getName() => $this->method1, $this->method2->getName() => $this->method2],
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
        $f = function(Method $method)
        {
            return $method->getName() == $this->method1->getName();
        };

        $this->assertEquals(
            [$this->method1->getName() => $this->method1],
            $this->hashSet->filter($f)
        );
    }

    public function testFindByDescriptorName()
    {
        $this->assertEquals(
            [$this->method1->getName() => $this->method1],
            $this->hashSet->findByDescriptorName(static::DESCRIPTOR)
        );
    }

    /**
     * @throws \Exception
     */
    public function testFindOneByDescriptorName()
    {
        $this->assertEquals($this->method1, $this->hashSet->findOneByDescriptorName(static::DESCRIPTOR));
    }

    public function testFindByDescriptorValue()
    {
        $this->assertEquals(
            [$this->method1->getName() => $this->method1],
            $this->hashSet->findByDescriptorValue(static::DESCRIPTOR, static::DESCRIPTOR_VALUE)
        );
    }

    /**
     * @throws \Exception
     */
    public function testFindOneByDescriptorValue()
    {
        $this->assertEquals(
            $this->method1,
            $this->hashSet->findOneByDescriptorValue(static::DESCRIPTOR, static::DESCRIPTOR_VALUE)
        );
    }

    public function testSet()
    {
        $hashSet = $this->createHashSet();
        $hashSet->set($this->method1);

        $this->assertAttributeEquals(
            [$this->method1->getName() => $this->method1], 'items', $hashSet
        );
    }

    public function testRemove()
    {
        $hashSet = $this->createHashSet([$this->method1, $this->method2]);
        $hashSet->remove(static::METHOD_2);

        $this->assertAttributeEquals(
            [$this->method1->getName() => $this->method1], 'items', $hashSet
        );
    }

    public function testClean()
    {
        $hashSet = $this->createHashSet([$this->method1, $this->method2]);
        $hashSet->clean();

        $this->assertAttributeEquals([], 'items', $hashSet);
    }

    /**
     * @throws \ReflectionException
     */
    public function testHasGetter()
    {
        $hashSet = $this->createHashSet([$this->createMethod('getP1'), $this->createMethod('isSomething')]);

        $this->assertTrue($hashSet->hasGetter('p1'));
        $this->assertFalse($hashSet->hasGetter('dummy'));

        $this->assertTrue($hashSet->hasGetter('something'));
        $this->assertFalse($hashSet->hasGetter('somethingElse'));
    }

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testExecuteGetter()
    {
        $hashSet = $this->createHashSet([$this->createMethod('getP1'), $this->createMethod('isSomething')]);

        $dummy = new Fake();

        $this->assertEquals(-1, $hashSet->executeGetter($dummy, 'p1'));
        $this->assertTrue($hashSet->executeGetter($dummy, 'something'));

        $this->expectException(NotFoundException::class);
        $hashSet->executeGetter($dummy, 'dummy');
    }

    /**
     * @throws \ReflectionException
     */
    public function testHasSetter()
    {
        $hashSet = $this->createHashSet([$this->createMethod('setP1')]);

        $this->assertTrue($hashSet->hasSetter('p1'));
        $this->assertFalse($hashSet->hasSetter('dummy'));
    }

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testExecuteSetter()
    {
        $hashSet = $this->createHashSet([$this->createMethod('setP1')]);

        $dummy = new Fake();

        $hashSet->executeSetter($dummy, 'p1', 1);
        $this->assertAttributeEquals(1, 'p1', $dummy);

        $this->expectException(NotFoundException::class);
        $hashSet->executeSetter($dummy, 'dummy', 1);
    }

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testExtract()
    {
        $dummy = new Fake();

        $hashSet = $this->createHashSet([$this->createMethod('getExtraction')]);
        $this->assertEquals(['test' => 1], $hashSet->extract($dummy, 'test-extract'));
        $this->assertEquals(['extraction' => 1], $hashSet->extract($dummy));

        $hashSet = $this->createHashSet([$this->createMethod('isExtraction')]);
        $this->assertEquals(['extraction' => 1], $hashSet->extract($dummy));

        $hashSet = $this->createHashSet([$this->createMethod('extraction')]);
        $this->assertEquals(['extraction' => 1], $hashSet->extract($dummy));

        $hashSet = $this->createHashSet([$this->createMethod('getRecursiveExtraction')]);
        $this->assertEquals(['recursiveExtraction' => []], $hashSet->extract($dummy));
    }

    /**
     * @throws \ReflectionException
     */
    public function testHydrate()
    {
        $hashSet = $this->createHashSet([$this->createMethod('setP1')]);

        $dummy = new Fake();
        $hashSet->hydrate($dummy, ['test' => 1], 'test-hydrate');
        $this->assertAttributeEquals(1, 'p1', $dummy);

        $dummy = new Fake();
        $hashSet->hydrate($dummy, ['p1' => 1]);
        $this->assertAttributeEquals(1, 'p1', $dummy);

        $dummy = new Fake();
        $hashSet->hydrate($dummy, ['dummy' => 1]);
        $this->assertAttributeEquals(-1, 'p1', $dummy);
    }

    /**
     * @throws \ReflectionException
     */
    public function testValidate()
    {
        $hashSet = $this->createHashSet(
            [$this->createMethod('validate'), $this->createMethod('testValidate')]
        );

        $dummy = new Fake();

        $this->assertEquals($hashSet, $hashSet->validate($dummy, 'dummy-validate'));

        try{
            $this->expectExceptionMessage('validate');
            $hashSet->validate($dummy);
        } catch (\Exception $e) {}

        $this->expectExceptionMessage('test-validate');
        $hashSet->validate($dummy, 'test-validate');
    }

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testParse()
    {
        $hashSet = $this->createHashSet([$this->createMethod('parse'), $this->createMethod('testParse')]);

        $dummy = new Fake();

        $source      = 'Nr. {test}';
        $placeHolder = '{%s}';

        $this->assertEquals('Nr. 1', $hashSet->parse($dummy, $source, null, $placeHolder));

        $this->assertEquals('Nr. 2', $hashSet->parse($dummy, $source, 'test-parse', $placeHolder));

        $this->assertEquals($source, $hashSet->parse($dummy, $source, 'dummy-parse', $placeHolder));
    }
}