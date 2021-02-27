<?php

namespace Blog\Component\User\LoginAutocomplete\View;

use GI\Component\Autocomplete\View\Widget as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Widget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait;
}