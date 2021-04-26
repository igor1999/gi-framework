<?php

namespace Blog\Component\Post\Search\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use Blog\Component\Post\Search\ViewModel\PostInterface as ViewModelInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel);
}