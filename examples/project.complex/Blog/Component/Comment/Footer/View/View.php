<?php

namespace Blog\Component\Comment\Footer\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Comment\I18n\I18nAwareTrait;
use Blog\Component\Comment\CommentRecordAwareTrait;

/**
 * Class View
 * @package Blog\Component\Comment\Footer\View
 *
 * @method bool isAllowDelete()
 * @method ViewInterface setAllowDelete($allow)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait, CommentRecordAwareTrait;


    const CLIENT_CSS = 'blog-comment-footer';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


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
}