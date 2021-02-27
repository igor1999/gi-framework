<?php

namespace Blog\Component\Post\Feed\Set;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Feed\Set\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Feed\Set\View\ViewInterface;
use Blog\Component\Post\Detail\Short\ShortInterface as DetailInterface;
use Blog\RDB\ORM\Post\SetInterface as PostSetInterface;

class Set extends AbstractComponent implements SetInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var PostSetInterface
     */
    private $postSet;


    /**
     * Set constructor.
     * @param PostSetInterface $postSet
     * @throws \Exception
     */
    public function __construct(PostSetInterface $postSet)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->postSet = $postSet;
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return PostSetInterface
     */
    protected function getPostSet()
    {
        return $this->postSet;
    }

    /**
     * @return DetailInterface[]
     * @throws \Exception
     */
    protected function createEntries()
    {
        $entries = [];

        foreach ($this->getPostSet()->getItems() as $post) {
            $entries[] = $this->blogGetComponentFactory()->getPostFactory()->createShortDetail($post);
        }

        return $entries;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setEntries($this->createEntries())->toString();
    }
}