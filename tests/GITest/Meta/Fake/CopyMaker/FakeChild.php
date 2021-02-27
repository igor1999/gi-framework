<?php

namespace GITest\Meta\Fake\CopyMaker;

class FakeChild
{
    /**
     * @var string
     */
    private $name = self::class;

    /**
     * @var FakeParent
     */
    private $parent;


    /**
     * FakeChild constructor.
     * @param FakeParent $parent
     */
    public function __construct(FakeParent $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return FakeParent
     */
    public function getParent()
    {
        return $this->parent;
    }
}