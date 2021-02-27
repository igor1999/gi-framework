<?php

namespace Blog\Component\Post\Detail\Base\Part;

use Blog\Component\Post\Footer\FooterInterface;

interface FooterAwareInterface
{
    /**
     * @return FooterInterface
     */
    public function getFooter();

    /**
     * @param FooterInterface $footer
     * @return self
     */
    public function setFooter(FooterInterface $footer);
}