<?php

namespace GITest\Meta\Constant;

use GI\Exception\NotInScope as NotInScopeException;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\ClassMeta;
use GI\Meta\Constant\ConstantList;
use GITest\Meta\Fake\Fake;
use GITest\Meta\Fake\Hierarchy\Member1;

class ConstantListTest extends TestCase
{
    const NAME_1 = 'CONST_1';

    const NAME_2 = 'CONST_2';


    /**
     * @var ClassMeta
     */
    private $owner;

    /**
     * @var ConstantList
     */
    private $constants;


    /**
     * @return static
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->owner = $this->createClassMeta(Fake::class);

        $this->constants = $this->owner->getConstants();

        return $this;
    }

    /**
     * @param string $class
     * @return ClassMeta
     * @throws \Exception
     */
    protected function createClassMeta($class)
    {
        return new ClassMeta($class);
    }

    public function testConstruct()
    {
        $this->assertAttributeEquals(
            [static::NAME_1 => 1, static::NAME_2 => 2],
            'items',
            $this->constants
        );
    }

    public function testHas()
    {
        $this->assertTrue($this->constants->has(static::NAME_1));
        $this->assertFalse($this->constants->has(static::NAME_1 . '_'));
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals(1, $this->constants->get(static::NAME_1));

        $this->expectException(NotInScopeException::class);
        $this->constants->get(static::NAME_1 . '_');
    }

    public function testGetOptional()
    {
        $this->assertEquals(1, $this->constants->getOptional(static::NAME_1));
        $this->assertNull($this->constants->getOptional(static::NAME_1 . '_'));
    }

    public function testGetItems()
    {
        $this->assertEquals(
            [static::NAME_1 => 1, static::NAME_2 => 2],
            $this->constants->getItems()
        );
    }

    /**
     * @throws \Exception
     */
    public function testIsEmpty()
    {
        $member1 = $this->createClassMeta(Member1::class);

        $this->assertTrue($member1->getConstants()->isEmpty());
        $this->assertFalse($this->constants->isEmpty());
    }
}