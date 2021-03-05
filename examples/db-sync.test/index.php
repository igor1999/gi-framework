<?php

use GI\Autoloader\Autoloader;

use GI\Application\Application\Micro\CLI\Application,
    GI\Application\Call\CLI\Call,
    GI\Application\Call\CLI\CallInterface;

use DI\DI;

use GI\RDB\Synchronizing\Dump\Dump,
    GI\RDB\Synchronizing\Check\Check;

use GI\REST\Route\Segmented\CLI\CLI as CLIRoute;


require_once dirname(dirname(__DIR__)) . '/vendor/gi-framework/gi-framework/GI/Autoloader/resources.php';
(new Autoloader())->addBaseNamespace('', __DIR__);


$di = new DI();

/** @noinspection PhpUnhandledExceptionInspection */
$dumpCall = (new Call(
    new CLIRoute('dump'),
    function (CallInterface $call)
    {
        unset($call);

        (new Dump())->dump()->printResultMessage();

        return true;
    }
))->setDi($di);

/** @noinspection PhpUnhandledExceptionInspection */
$checkCall = (new Call(
    new CLIRoute('check'),
    function (CallInterface $call)
    {
        unset($call);

        (new Check())->check()->printResultMessage();

        return true;
    }
))->setDi($di);


/** @noinspection PhpUnhandledExceptionInspection */
(new Application())->add($dumpCall)->add($checkCall)->run();