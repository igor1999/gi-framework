<?php

namespace GITest\Meta\ClassMeta\Behaviour;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\Behaviour\Traits\Traits;
use GI\Meta\ClassMeta\ClassMeta;
use GITest\Meta\Fake\Fake;
use GITest\Meta\Fake\FakeTrait;

class TraitsTest extends TestCase
{
    /**
     * @var ClassMeta
     */
    private $owner;

    /**
     * @var Traits
     */
    private $traits;


    /**
     * @return static
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->owner = $this->createClassMeta(Fake::class);

        $this->traits = $this->owner->getTraits();

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
        $this->assertEquals(FakeTrait::class, $this->traits->get(FakeTrait::class)->getName());

        $this->assertEquals(1, $this->traits->getLength());
    }
}