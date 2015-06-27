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

### Laravel 4
Add the serviceprovider to the list of service providers: `L4HTSTServiceProvider`

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
