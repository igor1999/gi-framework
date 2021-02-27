<?php

namespace Blog\Component\BreadCrumbs\Model;

use GI\ClientContents\BreadCrumbs\Container\ContainerInterface;
use GI\ClientContents\BreadCrumbs\Track\TrackInterface;
use GI\ClientContents\BreadCrumbs\Node\NodeInterface;

/**
 * Interface ModelInterface
 * @package Blog\Component\BreadCrumbs\Model
 *
 * @method NodeInterface getFeed()
 * @method NodeInterface getPost()
 * @method NodeInterface getEditPost()
 * @method NodeInterface getNewPost()
 * @method NodeInterface getNewComment()
 * @method NodeInterface getDeleteComment()
 * @method NodeInterface getUserStatisticSingle()
 * @method NodeInterface getUserStatisticTotally()
 * @method NodeInterface getError()
 */
interface ModelInterface extends ContainerInterface
{
    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectFeed();

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectPost($id, $title);

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectEditPost($id, $title);

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectNewComment($id, $title);

    /**
     * @param int $id
     * @param string $title
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectDeleteComment($id, $title);

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectNewPost();

    /**
     * @param int $id
     * @param string $login
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectUserStatisticSingle($id, $login);

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectUserStatisticTotally();

    /**
     * @return TrackInterface
     * @throws \Exception
     */
    public function selectError();
}