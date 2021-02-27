<?php

namespace Blog\Module\Call\Web\Container;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Blog\Module\Call\Web\Container\Post\Post as PostCallContainer;
use Blog\Module\Call\Web\Container\Comment\Comment as CommentCallContainer;
use Blog\Module\Call\Web\Container\User\User as UserCallContainer;
use Blog\Module\Call\Web\Container\Captcha\Captcha as CaptchaCallContainer;
use Blog\Module\Call\Web\Container\Authentication\Authentication as AuthenticationCallContainer;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Container extends Base implements ContainerInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->add(new PostCallContainer())
            ->add(new CommentCallContainer())
            ->add(new UserCallContainer())
            ->add(new CaptchaCallContainer())
            ->add(new AuthenticationCallContainer());
    }
}