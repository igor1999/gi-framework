<?php

namespace Blog\Component\User\LoginAutocomplete\View;

use GI\Component\Autocomplete\View\ResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/User/LoginAutocomplete';


    const CSS_PATHS = [
        'css/autocomplete.css'
    ];
}