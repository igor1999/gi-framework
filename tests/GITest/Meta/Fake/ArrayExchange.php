<?php

namespace GITest\Meta\Fake;

class ArrayExchange
{
    /**
     * @var int
     */
    private $p1 = -1;

    /**
     * @var int
     */
    private $p2 = -2;


    /**
     * @test-extract
     * @return int
     */
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * @test-hydrate
     * @param int $p1
     * @return self
     */
    public function setP1($p1)
    {
        $this->p1 = $p1;

        return $this;
    }

    /**
     * @extract
     * @return int
     */
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * @hydrate
     * @param int $p2
     * @return self
     */
    public function setP2($p2)
    {
        $this->p2 = $p2;

        return $this;
    }
}