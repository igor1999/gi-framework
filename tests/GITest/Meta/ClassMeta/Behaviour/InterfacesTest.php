<?php

namespace GITest\Meta\ClassMeta\Behaviour;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\Behaviour\Interfaces\Interfaces;
use GI\Meta\ClassMeta\ClassMeta;
use GITest\Meta\Fake\Fake;
use GITest\Meta\Fake\FakeInterface;

class InterfacesTest extends TestCase
{
    /**
     * @var ClassMeta
     */
    private $owner;

    /**
     * @var Interfaces
     */
    private $interfaces;


    /**
     * @return static
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->owner = $this->createClassMeta(Fake::class);

        $this->interfaces = $this->owner->getInterfaces();

        return $this;
    }

    /**
     * @param mixed $class
     * @return ClassMeta
     * @throws \Exception
     */
    protected function createClassMeta($class)
    {
        return new ClassMeta($class);
    }

    /**
     * @throws \Exception
     */
    public function testConstruct()
    {
        $this->assertEquals(FakeInterface::class, $this->interfaces->get(FakeInterface::class)->getName());

        $this->assertEquals(1, $this->interfaces->getLength());
    }
}