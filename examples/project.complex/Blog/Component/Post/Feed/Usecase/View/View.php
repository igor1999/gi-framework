<?php

namespace Blog\Component\Post\Feed\Usecase\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\I18n\I18nAwareTrait;

use Blog\Component\Post\Search\SearchInterface;
use Blog\Component\Post\Feed\Set\SetInterface as FeedSetInterface;

class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-post-feed-usecase';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var SearchInterface
     */
    private $searchComponent;

    /**
     * @var FeedSetInterface
     */
    private $feedSetComponent;

    /**
     * @var bool
     */
    private $auth;


    /**
     * View constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return SearchInterface
     */
    public function getSearchComponent()
    {
        return $this->searchComponent;
    }

    /**
     * @param SearchInterface $searchComponent
     * @return self
     */
    public function setSearchComponent(SearchInterface $searchComponent)
    {
        $this->searchComponent = $searchComponent;

        return $this;
    }

    /**
     * @return FeedSetInterface
     */
    public function getFeedSetComponent()
    {
        return $this->feedSetComponent;
    }

    /**
     * @param FeedSetInterface $feedSetComponent
     * @return self
     */
    public function setFeedSetComponent(FeedSetInterface $feedSetComponent)
    {
        $this->feedSetComponent = $feedSetComponent;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return $this->auth;
    }

    /**
     * @param bool $auth
     * @return self
     */
    public function setAuth(bool $auth)
    {
        $this->auth = $auth;

        return $this;
    }
}