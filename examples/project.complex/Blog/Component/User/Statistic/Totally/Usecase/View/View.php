<?php

namespace Blog\Component\User\Statistic\Totally\Usecase\View;

use GI\Component\Base\View\AbstractView;

use Blog\Component\User\I18n\I18nAwareTrait;
use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Totally\Table\TableInterface;

/**
 * Class View
 * @package Blog\Component\User\Statistic\Totally\Usecase\View
 *
 * @method TableInterface getTable()
 * @method ViewInterface setTable(TableInterface $table)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-user-statistic-totally';


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