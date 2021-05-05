<?php

namespace Blog\Component\User\Statistic\Totally\View\Widget\Template;

use GI\Component\Table\View\Widget\Template\Collection\AbstractCollection;
use GI\Component\Table\View\Widget\DOM\Header\Number\Number as HeaderNumber;
use GI\Component\Table\View\Widget\DOM\Body\Number\Number as BodyNumber;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\Login\Body\Body as LoginBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\Login\Header\Header as LoginHeader;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\Posts\Body\Body as PostsBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\Posts\Header\Header as PostsHeader;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\Comments\Body\Body as CommentsBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\Comments\Header\Header as CommentsHeader;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\ReceivedComments\Body\Body as ReceivedCommentsBody;
use Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\ReceivedComments\Header\Header as ReceivedCommentsHeader;

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