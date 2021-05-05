<?php

namespace Blog\Component\User\Statistic\Totally\View\Widget\Template;

use GI\Component\Table\View\Widget\Template\Collection\AbstractCollection;
use GI\Component\Table\View\Widget\DOM\Header\Number\Number as HeaderNumber;
use GI\Component\Table\View\Widget\DOM\Body\Number\Number as BodyNumber;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\Login\Body\Body as LoginBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\Login\Header\Header as LoginHeader;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\Posts\Body\Body as PostsBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\Posts\Header\Header as PostsHeader;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\Comments\Body\Body as CommentsBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\Comments\Header\Header as CommentsHeader;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\ReceivedComments\Body\Body as ReceivedCommentsBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\ReceivedComments\Header\Header as ReceivedCommentsHeader;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Template extends AbstractCollection implements TemplateInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Template constructor.
     */
    public function __construct()
    {
        $this->set('position', HeaderNumber::class, BodyNumber::class)
            ->set('login',LoginBody::class, LoginHeader::class)
            ->set('posts',PostsBody::class, PostsHeader::class)
            ->set('comments',CommentsBody::class, CommentsHeader::class)
            ->set(
                'received-comments',
                ReceivedCommentsBody::class,
                ReceivedCommentsHeader::class
            );
    }
}