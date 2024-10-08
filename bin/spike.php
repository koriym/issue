<?php

use BEAR\Sunday\Extension\Application\AppInterface;
use MyVendor\MyProject\Injector;
use MyVendor\MyProject\Resource\Page\Index;

require dirname(__DIR__) . '/autoload.php';

$compile = static function (string $context): void {
    Injector::getInstance($context)->getInstance(AppInterface::class);
};
$compile('app');

//Injector::getInstance('app')->getInstance(Index::class); // ランタイムでAOPファイルが作成される
$compile('prod-app');
$compile('prod-hal-app');


assert(NumOfAopFiles(('prod-app')) > 0,  'No AOP File!');
assert(NumOfAopFiles(('prod-hal-app')) > 0,  'No AOP File!');

/** $contextのAOPファイルの数  */
function NumOfAopFiles(string $context): int
{
    return count(
        glob(dirname(__DIR__) . "/var/tmp/{$context}/di/*[0-9].php")
    );
}
