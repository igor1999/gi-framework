<?php

namespace Core\Component\Layout\View;

use GI\Component\Layout\View\AbstractView as Base;

abstract class AbstractView extends Base implements ViewInterface
{
    const CLIENT_CSS = 'core-layout';
}