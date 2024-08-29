# Issue

複数のコンテキストでコンパイルした時に同じAOPクラスファイルが複数のディレクトリに書き込まれません

## 再現方法

```
git clone https://github.com/koriym/issue
cd issue
git checkout ray-aop-217-aop-class-in-context
composer insstall
php bin/spike.php
```

```
PHP Fatal error:  Uncaught AssertionError: No AOP File! in /private/tmp/issue/bin/spike.php:20
Stack trace:
#0 /private/tmp/issue/bin/spike.php(20): assert(false, 'No AOP File!')
#1 {main}
  thrown in /private/tmp/issue/bin/spike.php on line 20
```
