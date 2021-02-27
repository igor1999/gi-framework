<?php

namespace View;

use GI\Markup\Renderer\AbstractRenderer;

class View extends AbstractRenderer implements ViewInterface
{
    const DEFAULT_RELATIVE_PATH = 'templates/home.phtml';
}