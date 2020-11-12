## consolly/io
Package for working with input/output tasks
### Install
```shell script
composer require consolly/io
```
### How to use
```php
use Consolly\IO\Error\Err;
use Consolly\IO\Input\In;
use Consolly\IO\Output\Out;

Out::write('text'); // Write to stdout thread

Err::write('error text'); // Write to stderr thread

In::read(); // It will read stdin thread and return data
```