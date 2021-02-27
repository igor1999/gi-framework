<?php

namespace Blog\Component\Base\View;

trait BlogJSTrait
{
    /**
     * @return static
     * @throws \Exception
     */
    protected function addBlogJS()
    {
        $target = $this->giCreateClassDirChildFile(BlogJSTrait::class, 'web/js/blog.js');
        $url    = 'Blog/Component/Base/js/blog.js';

        $this->addJS($target, $url);

        return $this;
    }
}