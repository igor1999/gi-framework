<?php

namespace Blog\Component\Post\Footer\View;

use GI\Component\Base\View\AbstractView;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\I18n\I18nAwareTrait;
use Blog\Component\Post\PostRecordAwareTrait;

/**
 * Class View
 * @package Blog\Component\Post\Footer\View
 *
 * @method bool isAllowEdit()
 * @method ViewInterface setAllowEdit(bool $allow)
 * @method bool isAllowAddComment()
 * @method ViewInterface setAllowAddComment(bool $allow)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait, PostRecordAwareTrait;


    const CLIENT_CSS = 'blog-post-footer';


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