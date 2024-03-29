<?php

namespace Blog\Component\Post\Modifying\Creation\View;

use Blog\Component\Post\Modifying\Base\View\WidgetInterface as BaseInterface;
use Blog\Component\Post\Modifying\Creation\ViewModel\ViewModelInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel);
}