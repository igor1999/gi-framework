<?php

namespace GITest\Pattern\Factory;

use GI\Exception\NotInScope as NotInScopeException;

use PHPUnit\Framework\TestCase;
use GITest\Pattern\Factory\Fake\Fake;
use GITest\Pattern\Factory\Fake\Factory;
use GI\Pattern\Factory\ClassContainer\Container;
use GI\Meta\Method\Collection\Alterable as MethodCollection;
use GI\Meta\ClassMeta\ClassMeta;
use GI\Util\TextProcessing\PSRFormat\PrefixInterface as PSRFormatPrefixInterface;

class FactoryTest extends TestCase
{
    /**
     * @var Fake
     */
    private $fake;

    /**
     * @var Factory
     */
    private $factory;

    /**
     * @var MethodCollection
     */
    private $methodCollection;


    protected function setUp()
    {
        $this->fake = $this->createFake();

        $this->factory = $this->createFactory();

        $this->methodCollection = (new ClassMeta(Factory::class))->getMethods();

        return $this;
    }

    protected function createFake()
    {
        return new Fake();
    }

    protected function createFactory()
    {
        return new Factory();
    }

    /**
     * @throws \Exception
     */
    public function testCached()
    {
        $this->methodCollection->get('setCached')->execute($this->factory, [true]);
        $this->assertTrue($this->methodCollection->get('isCached')->execute($this->factory));

        $f = function() {};
        $this->methodCollection->get('setCached')->execute($this->factory, [$f]);
        $this->assertEquals($f, $this->methodCollection->get('isCached')->execute($this->factory));

        $this->methodCollection->get('setCached')->execute($this->factory, [false]);
        $this->assertFalse($this->methodCollection->get('isCached')->execute($this->factory));
    }

    /**
     * @throws \Exception
     */
    public function testHasAndSet()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('set')->execute($factory, [Fake::class]);

        $this->assertTrue($factory->has('Fake'));
        $this->assertFalse($factory->has('Fake_'));

    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('set')->execute($factory, [Fake::class]);

        $container = $factory->get('Fake');
        $this->assertInstanceOf(Container::class, $container);
        $this->assertEquals(Fake::class, $container->getClass());
        $this->assertFalse($container->isCached());

        $this->expectException(NotInScopeException::class);
        $factory->get('Fake_');
    }

    /**
     * @throws \Exception
     */
    public function testGetItems()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('set')->execute($factory, [Fake::class]);

        $items = $factory->getItems();

        reset($items);
        $this->assertCount(1, $items);
        $this->assertEquals('Fake', key($items));
        $this->assertInstanceOf(Container::class, $items['Fake']);
        $this->assertEquals(Fake::class, $items['Fake']->getClass());
    }

    /**
     * @throws \Exception
     */
    public function testIsEmpty()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('set')->execute($factory, [Fake::class]);

        $this->assertTrue($this->factory->isEmpty());
        $this->assertFalse($factory->isEmpty());
    }

    /**
     * @throws \Exception
     */
    public function testSetNamed()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('setNamed')->execute($factory, ['Alias', Fake::class]);

        $container = $factory->get('Alias');
        $this->assertInstanceOf(Container::class, $container);
        $this->assertEquals(Fake::class, $container->getClass());
        $this->assertFalse($container->isCached());
    }

    /**
     * @throws \Exception
     */
    public function testSetPrefix()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('setPrefixToGet')->execute($factory);
        $this->assertAttributeEquals(PSRFormatPrefixInterface::PREFIX_GET, 'prefix', $factory);

        $this->methodCollection->get('setPrefixToCreate')->execute($factory);
        $this->assertAttributeEquals(
            PSRFormatPrefixInterface::PREFIX_CREATE, 'prefix', $factory
        );
    }

    /**
     * @throws \Exception
     */
    public function testCreate()
    {
        $factory = $this->createFactory();

        $this->methodCollection->get('set')->execute($factory, [Fake::class]);

        $this->assertInstanceOf(Fake::class, $factory->create('createFake'));
        /** @noinspection PhpUndefinedMethodInspection */
        $this->assertInstanceOf(Fake::class, $factory->createFake());
        $this->assertInstanceOf(Fake::class, $factory->createWithPrefixGet('getFake'));
        $this->assertInstanceOf(Fake::class, $factory->createWithPrefixSet('setFake'));
        $this->assertInstanceOf(Fake::class, $factory->createWithPrefixAdd('addFake'));
        $this->assertInstanceOf(Fake::class, $factory->createWithPrefixInsert('insertFake'));
        $this->assertInstanceOf(Fake::class, $factory->createWithPrefixCreate('createFake'));
    }
}