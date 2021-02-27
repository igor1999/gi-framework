<?php

namespace Blog\Component\Comment\Usecase\Removing\View\Widget;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

trait ContentsTrait
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var LayoutInterface
     */
    private $container;

    /**
     * @var ButtonInterface
     */
    private $deleteButton;


    /**
     * @return int
     */
    protected function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return LayoutInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return ButtonInterface
     */
    public function getDeleteButton()
    {
        return $this->deleteButton;
    }
}