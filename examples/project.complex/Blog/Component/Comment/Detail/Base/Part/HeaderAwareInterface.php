<?php

namespace Blog\Component\Comment\Detail\Base\Part;

use Blog\Component\Comment\Header\HeaderInterface;

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