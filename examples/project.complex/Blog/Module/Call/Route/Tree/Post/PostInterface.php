<?php

namespace Blog\Module\Call\Route\Tree\Post;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

/**
 * Interface PostInterface
 * @package Blog\Module\Call\Route\Tree\Post
 *
 * @method buildDetailWithId($id)
 * @method buildEditWithId($id)
 * @method buildSaveEditWithId($id)
 * @method buildExecuteDeleteWithId($id)
 */
interface PostInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getFeed();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getDetail();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getEdit();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getSaveEdit();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getExecuteDelete();

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
}