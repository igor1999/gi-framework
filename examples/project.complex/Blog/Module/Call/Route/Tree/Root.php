<?php

namespace Blog\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Blog\Module\Call\Route\Tree\Post\Post as PostTree;
use Blog\Module\Call\Route\Tree\Comment\Comment as CommentTree;
use Blog\Module\Call\Route\Tree\User\User as UserTree;
use Blog\Module\Call\Route\Tree\Captcha\Captcha as CaptchaTree;
use Blog\Module\Call\Route\Tree\Authentication\Authentication as AuthenticationTree;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\Module\Call\Route\Tree\Post\PostInterface as PostTreeInterface;
use Blog\Module\Call\Route\Tree\Comment\CommentInterface as CommentTreeInterface;
use Blog\Module\Call\Route\Tree\User\UserInterface as UserTreeInterface;
use Blog\Module\Call\Route\Tree\Captcha\CaptchaInterface as CaptchaTreeInterface;
use Blog\Module\Call\Route\Tree\Authentication\AuthenticationInterface as AuthenticationTreeInterface;

/**
 * Class Root
 * @package Blog\Module\Call\Route\Tree
 *
 * @method PostTreeInterface getPostTree()
 * @method CommentTreeInterface getCommentTree()
 * @method UserTreeInterface getUserTree()
 * @method CaptchaTreeInterface getCaptchaTree()
 * @method AuthenticationTreeInterface getAuthenticationTree()
 */
class Root extends Base implements RootInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Root constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('PostTree', PostTree::class)
            ->setNamed('CommentTree', CommentTree::class)
            ->setNamed('UserTree', UserTree::class)
            ->setNamed('CaptchaTree', CaptchaTree::class)
            ->setNamed('AuthenticationTree', AuthenticationTree::class);
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/blog';
    }
}