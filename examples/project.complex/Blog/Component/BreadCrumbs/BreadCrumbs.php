<?php

namespace Blog\Component\BreadCrumbs;

use GI\Component\BreadCrumbs\Chain\AbstractBreadCrumbs as Base;
use Blog\Component\BreadCrumbs\Model\Model;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\BreadCrumbs\Model\ModelInterface;

/**
 * Class BreadCrumbs
 * @package Blog\Component\BreadCrumbs
 *
 * @method BreadCrumbsInterface selectFeed()
 * @method BreadCrumbsInterface selectPost($id, $title)
 * @method BreadCrumbsInterface selectEditPost($id, $title)
 * @method BreadCrumbsInterface selectNewComment($id, $title)
 * @method BreadCrumbsInterface selectDeleteComment($id, $title)
 * @method BreadCrumbsInterface selectNewPost()
 * @method BreadCrumbsInterface selectUserStatisticSingle($id, $login)
 * @method BreadCrumbsInterface selectUserStatisticTotally()
 * @method BreadCrumbsInterface selectError()
 */
class BreadCrumbs extends Base implements BreadCrumbsInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ModelInterface
     */
    private $breadCrumbsContainer;


    /**
     * BreadCrumbs constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->breadCrumbsContainer = $this->giGetDi(ModelInterface::class, Model::class);
    }

    /**
     * @return ModelInterface
     */
    protected function getBreadCrumbsContainer()
    {
        return $this->breadCrumbsContainer;
    }
}