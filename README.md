# ReqResLog

A simple Laravel HTTP request and response logger. This package adds a middleware which can log incoming requests and
outgoing responses to the default Laravel logger. It also auto loads the middleware on specified route groups.

## Installation

You can install the package via composer:

```bash
composer require centamiv/req-res-log
```

Optionally you can publish the configfile with:

```bash
php artisan vendor:publish --provider="ReqResLog\ReqResLogServiceProvider"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Groups
    |--------------------------------------------------------------------------
    |
    | Turn on the logger middleware for the route groups in the array.
    |
    */

    'groups' => [
        'api',
        // 'web',
    ],

];
```

## Usage

This package auto loads the middleware on specified route groups. You just need to specify these groups on the config
file.

Optionally you can also use the middleware provided by the package which can be added to your routes:

```php
// in a routes file

Route::post('/submit-form', function () {
    //
})->middleware(\ReqResLog\ReqResLogServiceProvider::class);
```

### Logging

This package uses the default Laravel channel to log messages with DEBUG level. It will write one line of log for every
received request and one line for every sent response. The log will look like this:

```
[2020-01-01 10:10:10] local.DEBUG: <- POST api/user {"code":"b3df5"} 
[2020-01-01 10:10:10] local.DEBUG: -> 200 {"name":"foo","surname":"bar","email":"foo@bar"} 
```

## Credits

- [Ivan Centamori](https://github.com/centamiv)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.