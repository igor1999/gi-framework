<?php

namespace GITest\Pattern\Factory\ClassContainer;

use PHPUnit\Framework\TestCase;
use GI\Pattern\Factory\ClassContainer\Container;
use GITest\Pattern\Factory\ClassContainer\Fake\Fake;

class ContainerTest extends TestCase
{
    protected function createContainer($cached)
    {
        return new Container(Fake::class, $cached);
    }

    public function testGetClass()
    {
        $container = $this->createContainer(false);
        $this->assertEquals(Fake::class, $container->getClass());
    }

    public function testIsCached()
    {
        $container = $this->createContainer(true);
        $this->assertTrue($container->isCached());

        $container = $this->createContainer(false);
        $this->assertFalse($container->isCached());
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $container = $this->createContainer(false);
        $fake = $container->get([5]);
        $this->assertInstanceOf(Fake::class, $fake);
        $this->assertAttributeEquals(5, 'p', $fake);

        $container = $this->createContainer(true);

        $fake0 = $container->get([]);
        $this->assertAttributeEquals(0, 'p', $fake0);
        $this->assertEquals($fake0, $container->get([]));

        $fake1 = $container->get([1]);
        $this->assertAttributeEquals(1, 'p', $fake1);
        $this->assertEquals($fake1, $container->get([1]));

        $f = function($value) {return $value;};
        $container = $this->createContainer($f);

        $fake2 = $container->get([2]);
        $this->assertAttributeEquals(2, 'p', $fake2);
        $this->assertEquals($fake2, $container->get([2]));
    }

    /**
     * @throws \Exception
     */
    public function testGetShortName()
    {
        $container = $this->createContainer(false);
        $this->assertEquals('Fake', $container->getShortName());
    }
}