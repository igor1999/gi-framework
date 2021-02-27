<?php

namespace Blog\Component\Comment\Usecase\Creation\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Footerless\FooterlessInterface as PostDetailInterface;
use Blog\Component\Comment\Modifying\Creation\CreationInterface as CommentCreationFormInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\Comment\Usecase\Creation\View
 *
 * @method PostDetailInterface getPostDetailComponent()
 * @method ViewInterface setPostDetailComponent(PostDetailInterface $post)
 * @method CommentCreationFormInterface getCommentFormComponent()
 * @method ViewInterface setCommentFormComponent(CommentCreationFormInterface $commentForm)
 */
interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}