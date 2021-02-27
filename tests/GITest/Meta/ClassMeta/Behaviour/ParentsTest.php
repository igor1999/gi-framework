<?php

namespace GITest\Meta\ClassMeta\Behaviour;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\Behaviour\Parents\Parents;
use GI\Meta\ClassMeta\ClassMeta;
use GITest\Meta\Fake\Hierarchy\Member1;
use GITest\Meta\Fake\Hierarchy\Member2;
use GITest\Meta\Fake\Hierarchy\Member3;
use GITest\Meta\Fake\Hierarchy\Member4;
use GITest\Meta\Fake\Hierarchy\Member5;

class ParentsTest extends TestCase
{
    /**
     * @var ClassMeta
     */
    private $owner;

    /**
     * @var Parents
     */
    private $parents;


    /**
     * @return static
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->owner = $this->createClassMeta(Member5::class);

        $this->parents = $this->owner->getParents();

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
        $this->assertEquals(Member1::class, $this->parents->get(Member1::class)->getName());
        $this->assertEquals(Member2::class, $this->parents->get(Member2::class)->getName());
        $this->assertEquals(Member3::class, $this->parents->get(Member3::class)->getName());
        $this->assertEquals(Member4::class, $this->parents->get(Member4::class)->getName());

        $this->assertEquals(4, $this->parents->getLength());
    }

    public function testGetOwner()
    {
        $this->assertEquals($this->owner, $this->parents->getOwner());
    }

    /**
     * @throws \Exception
     */
    public function testGetOrderedDescendants()
    {
        $hashSet = $this->parents->getOrderedAncestors([Member2::class, Member4::class]);

        $this->assertEquals(Member2::class, $hashSet->get(Member2::class)->getName());
        $this->assertEquals(Member4::class, $hashSet->get(Member4::class)->getName());

        $this->assertEquals(2, $hashSet->getLength());
    }
}