<?php

namespace Blog\Component\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use Blog\Component\Post\Factory\FactoryInterface as PostFactoryInterface;
use Blog\Component\Comment\Factory\FactoryInterface as CommentFactoryInterface;
use Blog\Component\User\Statistic\Factory\FactoryInterface as StatisticFactoryInterface;

use Blog\Component\Layout\LayoutInterface;
use Blog\Component\BreadCrumbs\BreadCrumbsInterface;
use Blog\Component\User\LoginAutocomplete\LoginAutocompleteInterface;

/**
 * Interface FactoryInterface
 * @package Blog\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method BreadCrumbsInterface createBreadCrumbs()
 * @method LoginAutocompleteInterface createLoginAutocomplete($name = [], $value = '')
 */
interface FactoryInterface extends BaseInterface
{
    /**
     * @return PostFactoryInterface
     */
    public function getPostFactory();

    /**
     * @return CommentFactoryInterface
     */
    public function getCommentFactory();

    /**
     * @return StatisticFactoryInterface
     */
    public function getStatisticFactory();
}