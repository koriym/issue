<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;

use Ray\Aop\NullInterceptor;
use function dirname;

class AppModule extends AbstractAppModule
{
    protected function configure(): void
    {
        (new Dotenv())->load(dirname(__DIR__, 2));
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->startsWith('on'),
            [NullInterceptor::class]
        );
        $this->install(new PackageModule());
    }
}
