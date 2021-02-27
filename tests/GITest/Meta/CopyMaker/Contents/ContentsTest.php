<?php

namespace GITest\Meta\CopyMaker\Contents;

use GI\Exception\InvalidType as InvalidTypeException;

use PHPUnit\Framework\TestCase;
use GI\Meta\CopyMaker\Contents\Contents;
use GI\Meta\CopyMaker\Registry\Registry;
use GITest\Meta\Fake\Fake;

class ContentsTest extends TestCase
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

    protected function createContents()
    {
        return new Contents($this->registry);
    }

    /**
     * @throws \Exception
     */
    public function testFillAndReset()
    {
        $contents = $this->createContents();

        $contents->fill($this->fake);
        $this->assertAttributeEquals(spl_object_hash($this->fake), 'hash', $contents);
        $this->assertAttributeEquals(Fake::class, 'class', $contents);
        $this->assertAttributeEquals(true, 'registered', $contents);

        $contents->reset();
        $this->assertAttributeEquals('', 'hash', $contents);
        $this->assertAttributeEquals('', 'class', $contents);
        $this->assertAttributeEquals(false, 'registered', $contents);

        $fake = $this->createFake();
        $contents->fill($fake);
        $this->assertAttributeEquals(spl_object_hash($fake), 'hash', $contents);
        $this->assertAttributeEquals(Fake::class, 'class', $contents);
        $this->assertAttributeEquals(false, 'registered', $contents);

        $this->expectException(InvalidTypeException::class);
        $contents->fill('');
    }

    /**
     * @throws \Exception
     */
    public function testClassEncoder()
    {
        $contents = $this->createContents();

        $f = function($class) {};

        $contents->setClassEncoder($f);
        $this->assertAttributeEquals($f, 'classEncoder', $contents);
        $this->assertEquals($f, $contents->getClassEncoder());
    }

    /**
     * @throws \Exception
     */
    public function testClassDecoder()
    {
        $contents = $this->createContents();

        $f = function($class) {};

        $contents->setClassDecoder($f);
        $this->assertAttributeEquals($f, 'classDecoder', $contents);
        $this->assertEquals($f, $contents->getClassDecoder());
    }

    /**
     * @throws \Exception
     */
    public function testGetClassAndHashAndRegistered()
    {
        $contents = $this->createContents();

        $contents->fill($this->fake);
        $this->assertEquals(spl_object_hash($this->fake), $contents->getHash());
        $this->assertEquals(Fake::class, $contents->getClass());
        $this->assertTrue($contents->isRegistered());
    }

    /**
     * @throws \Exception
     */
    public function testResetAndHydrate()
    {
        $contents = $this->createContents();

        $data = [
            'hash' => spl_object_hash($this->fake),
            'class' => Fake::class,
            'registered' => true,
        ];

        $contents->resetAndHydrate($data);
        $this->assertAttributeEquals(spl_object_hash($this->fake), 'hash', $contents);
        $this->assertAttributeEquals(Fake::class, 'class', $contents);
        $this->assertAttributeEquals(true, 'registered', $contents);

        $f = function($class)
        {
            return $class . '_';
        };

        $contents->setClassDecoder($f);
        $contents->resetAndHydrate($data);
        $this->assertAttributeEquals(Fake::class . '_', 'class', $contents);
    }

    /**
     * @throws \Exception
     */
    public function testExtract()
    {
        $contents = $this->createContents();

        $contents->fill($this->fake);

        $this->assertEquals(
            [
                'hash' => spl_object_hash($this->fake),
                'class' => Fake::class,
                'registered' => true,
            ],
            $contents->extract()
        );

        $f = function($class)
        {
            return $class . '_';
        };
        $contents->setClassEncoder($f);

        $this->assertEquals(
            [
                'hash' => spl_object_hash($this->fake),
                'class' => Fake::class . '_',
                'registered' => true,
            ],
            $contents->extract()
        );
    }

    /**
     * @throws \Exception
     */
    public function testValidateClass()
    {
        $contents = $this->createContents();

        $data = [
            'hash' => 1,
            'class' => '',
        ];

        $this->expectExceptionMessage('Class should not be empty');
        $contents->resetAndHydrate($data)->validateProperties();
   }

    /**
     * @throws \Exception
     */
    public function testValidateHash()
    {
        $contents = $this->createContents();

        $data = [
            'hash' => '',
            'class' => '_',
        ];

        $this->expectExceptionMessage('Hash should not be empty');
        $contents->resetAndHydrate($data)->validateProperties();
    }

    /**
     * @throws \Exception
     */
    public function testValidateRegisteredNotFound()
    {
        $contents = $this->createContents();

        $data = [
            'hash' => 1,
            'class' => '_',
            'registered' => true,
        ];

        $this->expectExceptionMessage('Registered is true, but no registered object found');
        $contents->resetAndHydrate($data)->validateProperties();
    }

    /**
     * @throws \Exception
     */
    public function testValidateNotRegisteredExist()
    {
        $contents = $this->createContents();

        $data = [
            'hash'      => spl_object_hash($this->fake),
            'class' => Fake::class,
        ];

        $this->expectExceptionMessage('Registered is false, but registered object exists');
        $contents->resetAndHydrate($data)->validateProperties();
    }

    /**
     * @throws \Exception
     */
    public function testValidateRegisteredNotEqual()
    {
        $contents = $this->createContents();

        $data = [
            'hash'       => spl_object_hash($this->fake),
            'class'  => '_',
            'registered' => true,
        ];

        $this->expectExceptionMessage('Given and registered classes are not equal');
        $contents->resetAndHydrate($data)->validateProperties();
    }

    /**
     * @throws \Exception
     */
    public function testValidateProperties()
    {
        $contents = $this->createContents();

        $data = [
            'hash'       => spl_object_hash($this->fake),
            'class'  => Fake::class,
            'registered' => true,
        ];

        $this->assertEquals($contents, $contents->resetAndHydrate($data)->validateProperties());
    }
}