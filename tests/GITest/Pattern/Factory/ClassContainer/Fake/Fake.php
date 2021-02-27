<?php

namespace GITest\Pattern\Factory\ClassContainer\Fake;

class Fake
{
    /**
     * @var int
     */
    private $p;


    public function __construct($p = 0)
    {
        $this->p = $p;
    }
}