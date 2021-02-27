<?php

namespace Blog\Component\Post\Detail\Base\Part;

use Blog\Component\Post\Header\HeaderInterface;

interface HeaderAwareInterface
{
    /**
     * @return HeaderInterface
     */
    public function getHeader();

    /**
     * @param HeaderInterface $header
     * @return self
     */
    public function setHeader(HeaderInterface $header);
}