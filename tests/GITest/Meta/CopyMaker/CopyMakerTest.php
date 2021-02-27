<?php

namespace GITest\Meta\CopyMaker;

use GI\Exception\InvalidType as InvalidTypeException;

use PHPUnit\Framework\TestCase;
use GI\Meta\CopyMaker\CopyMaker;
use GITest\Meta\Fake\CopyMaker\FakeParent;
use GITest\Meta\Fake\CopyMaker\FakeChild;
use GI\Meta\ClassMeta\ClassMeta;

class CopyMakerTest extends TestCase
{
    /**
     * @var CopyMaker
     */
    private $copyMaker;

    /**
     * @var FakeParent
     */
    private $fakeParent;


    protected function setUp()
    {
        $this->copyMaker = $this->createCopyMaker();

        $this->fakeParent = $this->createFakeParent();

        return $this;
    }

    protected function createCopyMaker()
    {
        return new CopyMaker();
    }

    protected function createFakeParent()
    {
        return new FakeParent();
    }

    protected function getExpand()
    {
        return [
            CopyMaker::OBJECT_CONTENTS_ELEMENT =>
                [
                    'class' => FakeParent::class,
                    'hash' => spl_object_hash($this->fakeParent),
                    'registered' => false
                ],
            'name' => $this->fakeParent->getName(),
            'child' => [
                CopyMaker::OBJECT_CONTENTS_ELEMENT =>
                    [
                        'class' => FakeChild::class,
                        'hash' => spl_object_hash($this->fakeParent->getChild()),
                        'registered' => false
                    ],
                'name' => $this->fakeParent->getChild()->getName(),
                'parent' => [
                    CopyMaker::OBJECT_CONTENTS_ELEMENT =>
                        [
                            'class' => FakeParent::class,
                            'hash' => spl_object_hash($this->fakeParent),
                            'registered' => true
                        ]
                ]
            ]
        ];
    }

    /**
     * @throws \Exception
     */
    public function testClassEncoderDecoder()
    {
        $f = function($class) {return $class;};

        $copyMaker = $this->createCopyMaker();
        $copyMaker->setClassEncoder($f)->setClassDecoder($f);

        $classMeta = new ClassMeta(CopyMaker::class);
        $contents = $classMeta->getProperties()->get('contents')->getValue($copyMaker);

        $this->assertAttributeEquals($f, 'classEncoder', $contents);
        $this->assertAttributeEquals($f, 'classDecoder', $contents);
    }

    /**
     * @throws \Exception
     */
    public function testExpand()
    {
        $this->assertEquals(1, $this->copyMaker->expand(1));

        $expand = $this->getExpand();

        $this->assertEquals($expand, $this->copyMaker->expand($this->fakeParent));

        $this->assertEquals([1, $expand], $this->copyMaker->expand([1, $this->fakeParent]));
    }

    /**
     * @throws \Exception
     */
    public function testFold()
    {
        $this->assertEquals(1, $this->copyMaker->fold(1));

        $expand = $this->getExpand();

        $this->checkFold($this->copyMaker->fold($expand));

        $fold = $this->copyMaker->fold([1, $expand]);
        $this->assertTrue(is_array($fold));
        $this->assertCount(2, $fold);
        list($scalar, $object) = $fold;
        $this->assertEquals(1, $scalar);
        $this->checkFold($object);

        $expand[CopyMaker::OBJECT_CONTENTS_ELEMENT] = null;
        $this->expectException(InvalidTypeException::class);
        $this->copyMaker->fold($expand);
    }

    protected function checkFold($fold)
    {
        $this->assertInstanceOf(FakeParent::class, $fold);
        $this->assertInstanceOf(FakeChild::class, $fold->getChild());
        $this->assertEquals($fold->getChild()->getParent(), $fold);

        $this->assertEquals(FakeParent::class, $fold->getName());
        $this->assertEquals(FakeChild::class, $fold->getChild()->getName());
    }

    /**
     * @throws \Exception
     */
    public function testMakeCopy()
    {
        $this->assertEquals(1, $this->copyMaker->makeCopy(1));

        $this->checkFold($this->copyMaker->makeCopy($this->fakeParent));

        $copy = $this->copyMaker->makeCopy([1, $this->fakeParent]);
        $this->assertTrue(is_array($copy));
        $this->assertCount(2, $copy);
        list($scalar, $object) = $copy;
        $this->assertEquals(1, $scalar);
        $this->checkFold($object);
    }
}