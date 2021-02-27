<?php

namespace Blog\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Blog\Module\Call\Route\Tree\Post\PostInterface as PostTreeInterface;
use Blog\Module\Call\Route\Tree\Comment\CommentInterface as CommentTreeInterface;
use Blog\Module\Call\Route\Tree\User\UserInterface as UserTreeInterface;
use Blog\Module\Call\Route\Tree\Captcha\CaptchaInterface as CaptchaTreeInterface;
use Blog\Module\Call\Route\Tree\Authentication\AuthenticationInterface as AuthenticationTreeInterface;

/**
 * Interface RootInterface
 * @package Blog\Module\Call\Route\Tree
 *
 * @method PostTreeInterface getPostTree()
 * @method CommentTreeInterface getCommentTree()
 * @method UserTreeInterface getUserTree()
 * @method CaptchaTreeInterface getCaptchaTree()
 * @method AuthenticationTreeInterface getAuthenticationTree()
 */
interface RootInterface extends BaseInterface
{

}