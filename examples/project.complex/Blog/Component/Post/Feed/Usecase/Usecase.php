<?php

namespace Blog\Component\Post\Feed\Usecase;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Feed\Usecase\View\View;
use Blog\Component\Post\Search\ViewModel\Post as ViewModel;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Search\SearchInterface;
use Blog\Component\Post\Feed\Set\SetInterface as FeedSetInterface;
use Blog\Component\Post\Feed\Usecase\View\ViewInterface;
use Blog\Component\Post\Search\ViewModel\PostInterface as ViewModelInterface;
use GI\Storage\Tree\TreeInterface;

class Usecase extends AbstractComponent implements UsecaseInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var TreeInterface
     */
    private static $sessionCache;

    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var ViewModelInterface
     */
    private $viewModel;

    /**
     * @var SearchInterface
     */
    private $searchComponent;

    /**
     * @var FeedSetInterface
     */
    private $feedSetComponent;


    /**
     * Feed constructor.
     * @param array $conditions
     * @throws \Exception
     */
    public function __construct(array $conditions = [])
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->viewModel = $this->giGetDi(ViewModelInterface::class, ViewModel::class);

        if (empty($conditions)) {
            $this->viewModel->hydrateFromSession(self::$sessionCache->extract());
        } else {
            $this->viewModel->hydrate($conditions);
            $this->viewModel->filter();
            self::$sessionCache->hydrate($this->viewModel->extractToSession());
        }

        $this->searchComponent = $this->blogGetComponentFactory()->getPostFactory()->createSearch($this->viewModel);

        $postSet = $this->blogGetRDBORMFactory()->createPostSet();
        $postSet->search($this->viewModel->extractToDB());

        $this->feedSetComponent = $this->blogGetComponentFactory()->getPostFactory()->createFeedSet($postSet);
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return ViewModelInterface
     */
    protected function getViewModel()
    {
        return $this->viewModel;
    }

    /**
     * @return SearchInterface
     */
    protected function getSearchComponent()
    {
        return $this->searchComponent;
    }

    /**
     * @return FeedSetInterface
     */
    protected function getFeedSetComponent()
    {
        return $this->feedSetComponent;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()
            ->setSearchComponent($this->getSearchComponent())
            ->setFeedSetComponent($this->getFeedSetComponent())
            ->setAuth($this->blogGetIdentity()->isAuthenticated())
            ->toString();
    }
}