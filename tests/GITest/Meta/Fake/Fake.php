<?php

namespace GITest\Meta\Fake;

/**
 * Class Dummy
 * @package GITest\Meta\Fake
 *
 * @test-descriptor test
 */
class Fake implements FakeInterface
{
    use FakeTrait;


    const CONST_1 = 1;

    const CONST_2 = 2;


    /**
     * @test-descriptor test
     * @var int
     */
    private $p1 = -1;

    /**
     * @var int
     */
    private $p2 = -2;

    /**
     * @var int
     */
    private static $p3 = -3;

    /**
     * @return int
     */
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * @test-hydrate test
     * @hydrate
     * @param int $p1
     * @return self
     */
    public function setP1($p1)
    {
        $this->p1 = $p1;

        return $this;
    }

    /**
     * @return int
     */
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * @param int $p2
     * @return self
     */
    public function setP2($p2)
    {
        $this->p2 = $p2;

        return $this;
    }

    /**
     * @return int
     */
    public static function getP3()
    {
        return self::$p3;
    }

    /**
     * @return bool
     */
    protected function isSomething()
    {
        return true;
    }

    /**
     * @test-descriptor test
     * @param mixed $a
     * @return mixed
     */
    protected function singleMethod($a)
    {
        return $a;
    }

    /**
     * @param mixed $a
     * @return mixed
     */
    protected static function staticSingleMethod($a)
    {
        return $a;
    }

    /**
     * @test-descriptor test
     * @param mixed $a
     * @return mixed
     */
    protected function collectionMethod1($a)
    {
        return $a;
    }

    /**
     * @param mixed $a
     * @return mixed
     */
    protected function collectionMethod2($a)
    {
        return $a;
    }

    /**
     * @test-extract test
     * @extract
     * @return int
     */
    protected function getExtraction()
    {
        return 1;
    }

    /**
     * @extract
     * @return int
     */
    protected function isExtraction()
    {
        return 1;
    }

    /**
     * @extract
     * @return int
     */
    protected function extraction()
    {
        return 1;
    }

    /**
     * @extract
     * @return Extractor
     */
    protected function getRecursiveExtraction()
    {
        return new Extractor();
    }

    /**
     * @test-validate
     * @throws \Exception
     */
    protected function testValidate()
    {
        throw new \Exception('test-validate');
    }

    /**
     * @validate
     * @throws \Exception
     */
    protected function validate()
    {
        throw new \Exception('validate');
    }

    /**
     * @parse test
     */
    protected function parse()
    {
        return 1;
    }

    /**
     * @test-parse test
     */
    protected function testParse()
    {
        return 2;
    }
}