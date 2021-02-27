<?php

namespace Blog\Module\Call\Route\Tree\Post;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

/**
 * Class Post
 * @package Blog\Module\Call\Route\Tree\Post
 *
 * @method buildDetailWithId($id)
 * @method buildEditWithId($id)
 * @method buildSaveEditWithId($id)
 * @method buildExecuteDeleteWithId($id)
 */
class Post extends Base implements PostInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->blogGetRouteTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/post';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getFeed()
    {
        return $this->createUriPathWithMethodGet('/feed');
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getDetail()
    {
        $route = $this->createUriPathWithMethodGet('/detail/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getEdit()
    {
        $route = $this->createUriPathWithMethodGet('/edit/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getSaveEdit()
    {
        $route = $this->createUriPathWithMethodPost('/save-edit/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getExecuteDelete()
    {
        $route = $this->createUriPathWithMethodPost('/delete/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getNew()
    {
        return $this->createUriPathWithMethodGet('/new');
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getSaveNew()
    {
        return $this->createUriPathWithMethodPost('/save-new');
    }
}