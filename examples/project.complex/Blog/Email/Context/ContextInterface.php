<?php

namespace Blog\Email\Context;

interface ContextInterface
{
    /**
     * @return string
     */
    public function getAdminEmail();
}