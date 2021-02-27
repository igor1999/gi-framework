<?php

namespace Blog\Component\Post\Search;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Search\View\Widget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Search\View\WidgetInterface;
use Blog\Component\Post\Search\ViewModel\PostInterface as ViewModelInterface;

class Search extends AbstractComponent implements SearchInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewModelInterface
     */
    private $viewModel;

    /**
     * @var WidgetInterface
     */
    private $view;


    /**
     * Search constructor.
     * @param ViewModelInterface $viewModel
     * @throws \Exception
     */
    public function __construct(ViewModelInterface $viewModel)
    {
        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);

        $this->viewModel = $viewModel;
    }

    /**
     * @return WidgetInterface
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
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setViewModel($this->getViewModel())->toString();
    }
}