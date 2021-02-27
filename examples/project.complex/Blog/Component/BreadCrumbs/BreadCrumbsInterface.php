<?php

namespace Blog\Component\BreadCrumbs;

use GI\Component\BreadCrumbs\Chain\BreadCrumbsInterface as BaseInterface;

/**
 * Interface BreadCrumbsInterface
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
interface BreadCrumbsInterface extends BaseInterface
{

}