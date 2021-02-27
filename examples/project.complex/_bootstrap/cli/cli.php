<?php

use GI\Application\Application\Complex\CLI\Application;
use Core\Module\Locator;


require_once dirname(__DIR__) . '/loader.php';

/** @noinspection PhpUnhandledExceptionInspection */
(new Application(new Locator()))->run();