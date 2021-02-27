<?php

namespace GITest\Meta\Fake\CopyMaker;

class FakeParent
{
    /**
     * @var string
     */
    private $name = self::class;

    /**
     * @var FakeChild
     */
    private $child;


    /**
     * FakeParent constructor.
     */
    public function __construct()
    {
        $this->child = new FakeChild($this);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return FakeChild
     */
    public function getChild()
    {
        return $this->child;
    }
}