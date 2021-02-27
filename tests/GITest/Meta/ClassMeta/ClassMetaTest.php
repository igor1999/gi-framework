<?php


namespace GITest\Meta\ClassMeta;

use PHPUnit\Framework\TestCase;
use GI\Meta\ClassMeta\ClassMeta;
use GITest\Meta\Fake\Fake;
use GITest\Meta\Fake\Child;
use GITest\Meta\Fake\ArrayExchange;
use GITest\Meta\Fake\Creation;
use GI\Meta\ClassMeta\Behaviour\Properties\Properties as PropertyCollection;
use GI\Meta\ClassMeta\Behaviour\Methods\Methods as MethodCollection;
use GI\Meta\Constant\ConstantList;
use GI\Meta\ClassMeta\Behaviour\Traits\Traits as TraitsCollection;
use GI\Meta\ClassMeta\Behaviour\Interfaces\Interfaces as InterfacesCollection;
use GI\Meta\ClassMeta\Behaviour\Parents\Parents as ParentsCollection;

class ClassMetaTest extends TestCase
{
    const DESCRIPTOR = 'test-descriptor';

    const DESCRIPTOR_VALUE = 'test';


    /**
     * @var ClassMeta
     */
    private $classMeta;


    /**
     * @return static
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->classMeta = $this->createClassMeta();

        return $this;
    }

    /**
     * @param mixed|null $class
     * @return ClassMeta
     * @throws \Exception
     */
    protected function createClassMeta($class = null)
    {
        if (empty($class)) {
            $class = Fake::class;
        }

        return new ClassMeta($class);
    }

    public function testConstruct()
    {
        $this->assertAttributeInstanceOf(\ReflectionClass::class, 'reflection', $this->classMeta);
        $this->assertAttributeInstanceOf(PropertyCollection::class, 'properties', $this->classMeta);
        $this->assertAttributeInstanceOf(MethodCollection::class, 'methods', $this->classMeta);
        $this->assertAttributeInstanceOf(ConstantList::class, 'constants', $this->classMeta);
    }

    public function testGetName()
    {
        $this->assertEquals(Fake::class, $this->classMeta->getName());
    }

    public function testGetShortName()
    {
        $this->assertEquals('Fake', $this->classMeta->getShortName());
    }

    public function testGetProperties()
    {
        $this->assertInstanceOf(PropertyCollection::class, $this->classMeta->getProperties());
    }

    public function testGetMethods()
    {
        $this->assertInstanceOf(MethodCollection::class, $this->classMeta->getMethods());
    }

    public function testGetConstants()
    {
        $this->assertInstanceOf(ConstantList::class, $this->classMeta->getConstants());
    }

    /**
     * @throws \Exception
     */
    public function testGetTraits()
    {
        $this->assertInstanceOf(TraitsCollection::class, $this->classMeta->getTraits());
    }

    /**
     * @throws \Exception
     */
    public function testGetInterfaces()
    {
        $this->assertInstanceOf(InterfacesCollection::class, $this->classMeta->getInterfaces());
    }

    /**
     * @throws \Exception
     */
    public function testGetParents()
    {
        $this->assertInstanceOf(ParentsCollection::class, $this->classMeta->getParents());
    }

    /**
     * @throws \Exception
     */
    public function testHydrate()
    {
        $arrayExchange = new ArrayExchange();
        $classMeta = $this->createClassMeta(ArrayExchange::class);
        $classMeta->hydrate($arrayExchange, ['p1' => 1], 'test-hydrate');
        $this->assertAttributeEquals(1, 'p1', $arrayExchange);
        $this->assertAttributeEquals(-2, 'p2', $arrayExchange);

        $arrayExchange = new ArrayExchange();
        $classMeta = $this->createClassMeta(ArrayExchange::class);
        $classMeta->hydrate($arrayExchange, ['p2' => 1]);
        $this->assertAttributeEquals(-1, 'p1', $arrayExchange);
        $this->assertAttributeEquals(1, 'p2', $arrayExchange);
    }

    /**
     * @throws \Exception
     */
    public function testExtract()
    {
        $arrayExchange = new ArrayExchange();

        $classMeta = $this->createClassMeta(ArrayExchange::class);

        $this->assertEquals(['p1' => -1], $classMeta->extract($arrayExchange, 'test-extract'));
        $this->assertEquals(['p2' => -2], $classMeta->extract($arrayExchange));
    }

    public function testHasDescriptor()
    {
        $this->assertTrue($this->classMeta->hasDescriptor(static::DESCRIPTOR));
        $this->assertFalse($this->classMeta->hasDescriptor(static::DESCRIPTOR . '-'));
    }

    public function testGetDescriptor()
    {
        $this->assertEquals(
            static::DESCRIPTOR_VALUE, $this->classMeta->getDescriptor(static::DESCRIPTOR)
        );

        $this->assertNull($this->classMeta->getDescriptor(static::DESCRIPTOR . '-'));
    }

    /**
     * @throws \Exception
     */
    public function testGetParent()
    {
        $classMeta = $this->createClassMeta(Child::class);
        $parent    = $classMeta->getParent();

        $this->assertInstanceOf(ClassMeta::class, $parent);
        $this->assertEquals(Fake::class, $parent->getName());

        $this->assertFalse($parent->getParent());
    }

    /**
     * @throws \Exception
     */
    public function testCreate()
    {
        $classMeta = $this->createClassMeta(Creation::class);

        $instance = $classMeta->create([1]);
        $this->assertAttributeEquals(1, 'p', $instance);

        $instance = $classMeta->create();
        $this->assertAttributeEquals(2, 'p', $instance);
    }

    /**
     * @throws \Exception
     */
    public function testCreateWithoutConstructor()
    {
        $classMeta = $this->createClassMeta(Creation::class);

        $instance = $classMeta->createWithoutConstructor();
        $this->assertAttributeEquals(0, 'p', $instance);
    }
}