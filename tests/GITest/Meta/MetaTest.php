<?php

namespace GITest\Meta;

use PHPUnit\Framework\TestCase;
use GI\Meta\Meta;
use GI\Meta\ClassMeta\Factory\Factory as ClassMetaFactory;
use GI\Meta\ClassMeta\Collection\Alterable as ClassMetaCollection;
use GI\Meta\Method\Collection\Alterable as MethodCollection;
use GI\Meta\Property\Collection\Alterable as PropertyCollection;
use GITest\Meta\Fake\Fake;
use GI\DI\DI as DIContainer;
use GI\ServiceLocator\ServiceLocator;
use GI\Meta\CopyMaker\CopyMaker;

class MetaTest extends TestCase
{
    /**
     * @var Meta
     */
    private $meta;


    protected function setUp()
    {
        $this->meta = $this->createMeta();

        return $this;
    }

    protected function createMeta()
    {
        return new Meta();
    }

    public function testConstruct()
    {
        $this->assertAttributeInstanceOf(ClassMetaFactory::class, 'classMetaFactory', $this->meta);
    }

    /**
     * @throws \Exception
     */
    public function testHasClassMetaAndGetClassMeta()
    {
        $this->assertFalse($this->meta->hasClassMeta(Fake::class));

        $this->assertEquals(Fake::class, $this->meta->getClassMeta(Fake::class)->getName());

        $this->assertTrue($this->meta->hasClassMeta(Fake::class));
    }

    /**
     * @throws \Exception
     */
    public function testCreateClassMetaCollection()
    {
        $this->assertInstanceOf(ClassMetaCollection::class, $this->meta->createClassMetaCollection());
    }

    public function testCreateMethodCollection()
    {
        $this->assertInstanceOf(MethodCollection::class, $this->meta->createMethodCollection());
    }

    public function testCreatePropertyCollection()
    {
        $this->assertInstanceOf(PropertyCollection::class, $this->meta->createPropertyCollection());
    }

    public function testGetCopyMaker()
    {
        $fake = new Fake();

        $diContainer = $this->getMockBuilder(DIContainer::class)->getMock();
        $diContainer->method('find')->willReturn($fake);

        $serviceLocator = $this->getMockBuilder(ServiceLocator::class)->getMock();
        $serviceLocator->method('getDi')->willReturn($diContainer);

        $meta = $this->getMockBuilder(Meta::class)->setMethods(['giGetServiceLocator'])->getMock();
        $meta->method('giGetServiceLocator')->willReturn($serviceLocator);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->assertEquals($fake, $meta->getCopyMaker());

        $this->assertInstanceOf(CopyMaker::class, $this->meta->getCopyMaker());
    }
}