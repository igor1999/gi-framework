<?php

namespace Chat\Component\Conversation\View;

use Chat\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Chat/Conversation';


    const CSS_PATHS = [
        'css/conversation.css'
    ];

    const JS_PATHS = [
        'js/conversation.js',
        'js/factory.js'
    ];
}