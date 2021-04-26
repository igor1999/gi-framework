<?php

namespace Blog\Component\Post\Modifying\Edition\View;

use Blog\Component\Post\Modifying\Base\View\WidgetInterface as BaseInterface;
use Blog\Component\Post\Modifying\Edition\ViewModel\ViewModelInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param int $id
     * @return self
     */
    public function setId($id);

    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel);
}