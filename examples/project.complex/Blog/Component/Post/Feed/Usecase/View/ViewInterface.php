<?php

namespace Blog\Component\Post\Feed\Usecase\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Search\SearchInterface;
use Blog\Component\Post\Feed\Set\SetInterface as FeedSetInterface;
use Blog\ServiceLocator\ServiceLocatorAwareInterface;
use Blog\Component\Post\I18n\I18nAwareInterface;

interface ViewInterface extends BaseInterface, ServiceLocatorAwareInterface, I18nAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();

    /**
     * @return SearchInterface
     */
    public function getSearchComponent();

    /**
     * @param SearchInterface $search
     * @return self
     */
    public function setSearchComponent(SearchInterface $search);

    /**
     * @return FeedSetInterface
     */
    public function getFeedSetComponent();

    /**
     * @param FeedSetInterface $feed
     * @return self
     */
    public function setFeedSetComponent(FeedSetInterface $feed);

    /**
     * @return bool
     */
    public function isAuth();

    /**
     * @param bool $auth
     * @return self
     */
    public function setAuth(bool $auth);
}