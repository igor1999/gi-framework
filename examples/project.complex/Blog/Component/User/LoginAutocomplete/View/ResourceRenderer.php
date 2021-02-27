<?php

namespace Blog\Component\User\LoginAutocomplete\View;

use GI\Component\Autocomplete\View\ResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/User/LoginAutocomplete';


    const CSS_PATHS = [
        'css/autocomplete.css'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createContents(self::class, '', self::URL_BASE_DIR, self::CSS_PATHS);
    }
}