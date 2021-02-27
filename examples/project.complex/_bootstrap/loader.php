<?php

use GI\Autoloader\Autoloader;


require_once dirname(dirname(__DIR__)) . '/vendor/gi-framework/gi-framework/Autoloader/resources.php';

(new Autoloader())->addBaseNamespace('', dirname(__DIR__));
