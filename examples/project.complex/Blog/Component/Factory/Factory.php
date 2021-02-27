<?php

namespace Blog\Component\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Component\Post\Factory\Factory as PostFactory;
use Blog\Component\Comment\Factory\Factory as CommentFactory;
use Blog\Component\User\Statistic\Factory\Factory as StatisticFactory;

use Blog\Component\Layout\Layout;
use Blog\Component\BreadCrumbs\BreadCrumbs;
use Blog\Component\User\LoginAutocomplete\LoginAutocomplete;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\Component\Post\Factory\FactoryInterface as PostFactoryInterface;
use Blog\Component\Comment\Factory\FactoryInterface as CommentFactoryInterface;
use Blog\Component\User\Statistic\Factory\FactoryInterface as StatisticFactoryInterface;

use Blog\Component\Layout\LayoutInterface;
use Blog\Component\BreadCrumbs\BreadCrumbsInterface;
use Blog\Component\User\LoginAutocomplete\LoginAutocompleteInterface;

/**
 * Class Factory
 * @package Blog\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method BreadCrumbsInterface createBreadCrumbs()
 * @method LoginAutocompleteInterface createLoginAutocomplete($name = [], $value = '')
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var PostFactoryInterface
     */
    private $postFactory;

    /**
     * @var CommentFactoryInterface
     */
    private $commentFactory;

    /**
     * @var StatisticFactoryInterface
     */
    private $statisticFactory;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->set(Layout::class)
            ->set(BreadCrumbs::class)
            ->set(LoginAutocomplete::class);
    }

    /**
     * @return PostFactoryInterface
     */
    public function getPostFactory()
    {
        if (!($this->postFactory instanceof PostFactoryInterface)) {
            $this->postFactory = new PostFactory();
        }

        return $this->postFactory;
    }

    /**
     * @return CommentFactoryInterface
     */
    public function getCommentFactory()
    {
        if (!($this->commentFactory instanceof CommentFactoryInterface)) {
            $this->commentFactory = new CommentFactory();
        }

        return $this->commentFactory;
    }

    /**
     * @return StatisticFactoryInterface
     */
    public function getStatisticFactory()
    {
        if (!($this->statisticFactory instanceof StatisticFactoryInterface)) {
            $this->statisticFactory = new StatisticFactory();
        }

        return $this->statisticFactory;
    }
}