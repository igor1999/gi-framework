<?php

namespace Blog\Module\Call\Route\Tree\Comment;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

/**
 * Interface CommentInterface
 * @package Blog\Module\Call\Route\Tree\Comment
 *
 * @method buildNewWithPostID($postID)
 * @method buildSaveNewWithPostID($postID)
 * @method buildDeleteWithId($id)
 * @method buildExecuteDeleteWithId($id)
 */
interface CommentInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getNew();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getSaveNew();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getDelete();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getExecuteDelete();
}