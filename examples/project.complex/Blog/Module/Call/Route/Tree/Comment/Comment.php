<?php

namespace Blog\Module\Call\Route\Tree\Comment;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

/**
 * Class Comment
 * @package Blog\Module\Call\Route\Tree\Comment
 *
 * @method buildNewWithPostID($postID)
 * @method buildSaveNewWithPostID($postID)
 * @method buildDeleteWithId($id)
 * @method buildExecuteDeleteWithId($id)
 */
class Comment extends Base implements CommentInterface
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
        return '/comment';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getNew()
    {
        $route = $this->createUriPathWithMethodGet('/new/:postID');
        $route->setConstraint('postID', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getSaveNew()
    {
        $route = $this->createUriPathWithMethodPost('/save-new/:postID');
        $route->setConstraint('postID', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getDelete()
    {
        $route = $this->createUriPathWithMethodGet('/delete/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getExecuteDelete()
    {
        $route = $this->createUriPathWithMethodPost('/execute-delete/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }
}