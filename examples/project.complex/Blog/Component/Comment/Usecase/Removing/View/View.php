<?php

namespace Blog\Component\Comment\Usecase\Removing\View;

use GI\Component\Base\View\AbstractView;
use Blog\Component\Comment\Usecase\Removing\View\Widget\Widget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Detail\Footerless\FooterlessInterface as PostDetailInterface;
use Blog\Component\Comment\Detail\Footerless\FooterlessInterface as CommentDetailInterface;
use Blog\Component\Comment\Usecase\Removing\View\Widget\WidgetInterface;

/**
 * Class View
 * @package Blog\Component\Comment\Usecase\Removing\View
 *
 * @method PostDetailInterface getPostDetailComponent()
 * @method ViewInterface setPostDetailComponent(PostDetailInterface $post)
 * @method CommentDetailInterface getCommentDetailComponent()
 * @method ViewInterface setCommentDetailComponent(CommentDetailInterface $commentDetail)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'blog-comment-usecase-removing';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var int
     */
    private $id;

    /**
     * @var WidgetInterface
     */
    private $widget;


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

        $this->widget = $this->giGetDi(WidgetInterface::class, Widget::class);
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return int
     */
    protected function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return WidgetInterface
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $this->getWidget()->setId($this->getId());

        return parent::toString();
    }
}