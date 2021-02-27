<?php

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    include __DIR__ . '/vendor/autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php not found. Did you run `php composer.phar install`?');
}