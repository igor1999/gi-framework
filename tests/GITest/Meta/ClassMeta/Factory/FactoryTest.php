<?php

namespace GITest\Meta\ClassMeta\Factory;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\Factory\Factory;
use GITest\Meta\Fake\Fake;

class FactoryTest extends TestCase
{
    /**
     * @var Factory
     */
    private $factory;


    protected function setUp()
    {
        $this->factory = $this->createFactory();

        return $this;
    }

    protected function createFactory()
    {
        return new Factory();
    }

    /**
     * @throws \Exception
     */
    public function testHasAndGet()
    {
        $this->assertFalse($this->factory->has(Fake::class));

        $this->assertEquals(Fake::class, $this->factory->get(Fake::class)->getName());

        $this->assertTrue($this->factory->has(Fake::class));

        $this->assertEquals(Fake::class, $this->factory->get(Fake::class)->getName());
    }
}