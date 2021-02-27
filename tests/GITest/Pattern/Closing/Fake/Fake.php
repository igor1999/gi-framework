<?php

namespace GITest\Pattern\Closing\Fake;

use GI\Pattern\Closing\ClosingTrait;

use GI\Pattern\Closing\ClosingInterface;

class Fake implements ClosingInterface
{
    use ClosingTrait;


    /**
     * @return int
     * @throws \Exception
     */
    public function set()
    {
        $this->validateClosing();

        return 1;
    }
}