<?php

use BEAR\Sunday\Extension\Application\AppInterface;
use MyVendor\MyProject\Injector;

require dirname(__DIR__) . '/autoload.php';

$compile = static function (string $context): void {
    Injector::getInstance($context)->getInstance(AppInterface::class);
};
$compile('app');
$compile('prod-app');


assert(NumOfAopFiles(('prod-app')) > 0,  'No AOP File!');
assert(NumOfAopFiles(('app')) > 0,  'No AOP File!');

/** $contextのAOPファイルの数  */
function NumOfAopFiles(string $context): int
{
    return count(
        glob(dirname(__DIR__) . "/var/tmp/{$context}/di/*[0-9].php")
    );
}
