<?php
/** @noinspection PhpUnhandledExceptionInspection */

use GI\Autoloader\Autoloader;

use GI\Application\Application\Micro\Web\Application,
    GI\Application\Call\Web\Call as WebCall,
    GI\Application\Call\Web\CallInterface as WebCallInterface;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\Get as GetRoute;

use View\View;


require_once dirname(dirname(__DIR__)) . '/vendor/gi-framework/gi-framework/GI/Autoloader/resources.php';
(new Autoloader())->addBaseNamespace('View', dirname(__DIR__) . '/View');

$homeCall = new WebCall(
    new GetRoute('/'),
    function (WebCallInterface $call)
    {
        $call->setResponseToSimple(new View());

        return true;
    }
);

$cryptCall = new WebCall(
    new GetRoute('/crypt'),
    function (WebCallInterface $call)
    {
        try {
            $word     = $call->getRequest()->getQuery()->getOptional('word');
            $encoding = $call->getRequest()->getQuery()->getOptional('encoding');

            if (empty($word)) {
                throw new Exception('word for encoding should not be empty');
            }

            if (empty($encoding)) {
                throw new Exception('encoding should not be empty');
            }

            switch (strtolower($encoding)) {
                case 'sha1':
                    $word = sha1($word);
                    break;
                case 'md5':
                    $word = md5($word);
                    break;
                default:
                    throw new Exception('encoding not found');
            }

            $call->setResponseToSimple($word);
        } catch (Exception $e) {
            $call->setResponseToStatus500($e->getMessage());
        }

        return true;
    }
);

(new Application())->add($homeCall)->add($cryptCall)->run();