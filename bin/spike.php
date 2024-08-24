<?php

use BEAR\Sunday\Extension\Application\AppInterface;
use MyVendor\MyProject\Injector;

require dirname(__DIR__) . '/autoload.php';

$compile = static function (string $context): void {
    Injector::getInstance($context)->getInstance(AppInterface::class);
};
$compile('app');
$compile('prod-app');

assert(file_exists(dirname(__DIR__) . '/var/tmp/prod-app/di/-BEAR_RepositoryModule_Annotation_Commands.php'));
