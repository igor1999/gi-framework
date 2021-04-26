<?php

namespace Blog\Component\Comment\Modifying\Creation\View;

use Blog\Component\Comment\Modifying\Base\View\WidgetInterface as BaseInterface;
use Blog\Component\Comment\Modifying\Creation\ViewModel\ViewModelInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param int $postID
     * @return self
     */
    public function setPostID(int $postID);

    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel);
}