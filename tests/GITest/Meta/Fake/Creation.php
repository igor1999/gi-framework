<?php

namespace GITest\Meta\Fake;

class Creation
{
    /**
     * @var int
     */
    private $p = 0;


    public function __construct($p = 2)
    {
        $this->p = $p;
    }
}