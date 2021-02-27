<?php

namespace GITest\Meta\CopyMaker\Registry;

use GI\Exception\InvalidType as InvalidTypeException;
use GI\Exception\NotFound as NotFoundException;

use PHPUnit\Framework\TestCase;
use GI\Meta\CopyMaker\Registry\Registry;
use GITest\Meta\Fake\Fake;
use GI\Meta\Meta;

class RegistryTest extends TestCase
{
    /**
     * @var Fake
     */
    private $fake;

    /**
     * @var Registry
     */
    private $registry;


    /**
     * @return self
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->fake = $this->createFake();

        $this->registry = $this->createRegistry()->add($this->fake);

        return $this;
    }

    protected function createFake()
    {
        return new Fake();
    }

    protected function createRegistry()
    {
        return new Registry();
    }

    public function testHas()
    {
        $this->assertTrue($this->registry->has(spl_object_hash($this->fake)));
        $this->assertFalse($this->registry->has(0));
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals($this->fake, $this->registry->get(spl_object_hash($this->fake)));

        $this->expectException(NotFoundException::class);
        $this->registry->get(0);
    }

    /**
     * @throws \Exception
     */
    public function testGetItems()
    {
        $meta  = new Meta();
        $items = $meta->getClassMeta(Registry::class)->getMethods()->get('getItems')->execute($this->registry);

        $this->assertEquals([spl_object_hash($this->fake) => $this->fake], $items);
    }

    /**
     * @throws \Exception
     */
    public function testAdd()
    {
        $registry = $this->createRegistry()->add($this->fake);
        $this->assertAttributeEquals([spl_object_hash($this->fake) => $this->fake], 'items', $registry);

        $registry = $this->createRegistry();
        $this->expectException(InvalidTypeException::class);
        $registry->add(0);
    }

    /**
     * @throws \Exception
     */
    public function testSet()
    {
        $registry = $this->createRegistry()->set(Fake::class, $this->fake);
        $this->assertAttributeEquals([Fake::class => $this->fake], 'items', $registry);

        $registry = $this->createRegistry();
        $this->expectException(InvalidTypeException::class);
        $registry->set(0, 0);
    }

    /**
     * @throws \Exception
     */
    public function testClean()
    {
        $registry = $this->createRegistry()->add($this->fake);
        $this->assertAttributeEquals([spl_object_hash($this->fake) => $this->fake], 'items', $registry);

        $registry->clean();
        $this->assertAttributeEquals([], 'items', $registry);
    }

    /**
     * @throws \Exception
     */
    public function testValidateClass()
    {
        $registry = $this->createRegistry()->add($this->fake);

        $this->assertTrue($registry->validateClass(spl_object_hash($this->fake), Fake::class));
    }
}