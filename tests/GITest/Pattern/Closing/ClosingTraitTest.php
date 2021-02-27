<?php

namespace GITest\Pattern\Closing;

use PHPUnit\Framework\TestCase;
use GITest\Pattern\Closing\Fake\Fake;
use GI\Pattern\Closing\Exception;

class ClosingTraitTest extends TestCase
{
    protected function createFake()
    {
        return new Fake();
    }

    public function testClose()
    {
        $fake = $this->createFake();

        $this->assertAttributeEquals(false, 'closed', $fake);

        $fake->close();
        $this->assertAttributeEquals(true, 'closed', $fake);

        $this->assertTrue($fake->isClosed());
    }

    /**
     * @throws \Exception
     */
    public function testValidateClosing()
    {
        $fake = $this->createFake();

        $this->assertEquals(1, $fake->set());

        $fake->close();
        $this->expectException(Exception::class);
        $fake->set();
    }
}