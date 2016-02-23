# strict-transport-security

[![Latest Version](https://img.shields.io/github/release/Zae/strict-transport-security.svg?style=flat-square)](https://github.com/Zae/strict-transport-security/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/Zae/strict-transport-security/master.svg?style=flat-square)](https://travis-ci.org/Zae/strict-transport-security)
[![Total Downloads](https://img.shields.io/packagist/dt/Zae/strict-transport-security.svg?style=flat-square)](https://packagist.org/packages/Zae/strict-transport-security)

Enable HTTP Strict Transport Security using HTTP Middleware

## L4 / L5

Middleware is available for both Laravel 4 and 5.

## Install

Via Composer

``` bash
$ composer require zae/strict-transport-security
```

## Usage

### Laravel 5
Add the class `Zae\StrictTransportSecurity\Middleware\L5\StrictTransportSecurity` to the `$middlewares` array.

``` php
#app/Http/Kernel.php

protected $middleware = [
	'Illuminate\View\Middleware\ShareErrorsFromSession',
	'Zae\StrictTransportSecurity\Middleware\L5\StrictTransportSecurity',
];
```
It's not strictly required to use the middleware but if you want to use the `vendor:publish` command add the service provider `Zae\StrictTransportSecurity\ServiceProvider\L5HTSTServiceProvider` to the `providers` array in the app config.
``` php
#config/app.php

return [
	'providers' => [
		Illuminate\View\ViewServiceProvider::class,

		Zae\StrictTransportSecurity\ServiceProvider\L5HTSTServiceProvider::class,
	],
];
```

Publish the config with `php artisan vendor:publish`. This file will be created at `config/hsts.php`.

### Laravel 4
Add the serviceprovider to the list of service providers: `Zae\StrictTransportSecurity\ServiceProvider\L4HTSTServiceProvider`

``` php
#app/config.php

'providers' => array(
	'Illuminate\Foundation\Providers\ArtisanServiceProvider',
	'Illuminate\Auth\AuthServiceProvider',
	
	'Zae\StrictTransportSecurity\ServiceProvider\L4HTSTServiceProvider',
),
```

### Silex Example
``` php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/', function(Request $request) {
return new Response('Hello world!', 200);
});

$app = (new Stack\Builder())
->push('Zae\StrictTransportSecurity\Middleware\L4\StrictTransportSecurity', [new \Zae\StrictTransportSecurity\HSTS(new Illuminate\Config\Repository())])
->resolve($app)
;

$request = Request::createFromGlobals();
$response = $app->handle($request)->send();

$app->terminate($request, $response);
```

### Symfony Example
``` php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();

$app = (new Stack\Builder())
	->push('Zae\StrictTransportSecurity\Middleware\L4\StrictTransportSecurity', [new \Zae\StrictTransportSecurity\HSTS(new Illuminate\Config\Repository())])
	->resolve($app)
;

$kernel = $stack->resolve($kernel);

Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
```

## Testing

``` bash
$ phpunit
```

## Contributing

Contributions are welcome via pull requests on github.

## Credits

- [Ezra Pool](https://github.com/Zae)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
