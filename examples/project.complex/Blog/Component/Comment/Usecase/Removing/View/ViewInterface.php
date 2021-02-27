<?php

namespace Blog\Component\Comment\Usecase\Removing\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Footerless\FooterlessInterface as PostDetailInterface;
use Blog\Component\Comment\Detail\Footerless\FooterlessInterface as CommentDetailInterface;
use Blog\Component\Comment\Usecase\Removing\View\Widget\WidgetInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\Comment\Usecase\Removing\View
 *
 * @method PostDetailInterface getPostDetailComponent()
 * @method ViewInterface setPostDetailComponent(PostDetailInterface $post)
 * @method CommentDetailInterface getCommentDetailComponent()
 * @method ViewInterface setCommentDetailComponent(CommentDetailInterface $commentDetail)
 */
interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id);

    /**
     * @return WidgetInterface
     */
    public function getWidget();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}