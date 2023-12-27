![Screenshot](https://github.com/tomatophp/tomato-user-activities/blob/master/art/screenshot.png)

# Tomato User Activities

Advanced logger is a laravel package used to automatically log every request made to you laravel application. Each request is also identified by hash, which can be used in standard log to identify the request.

This package has been inspired by package https://github.com/andersao/laravel-request-logger from Anderson Andrade. 

## Installation

```bash
composer require tomatophp/tomato-user-activities
```

## Configuration

All options are described in `config/tomato-user-activities.php`.

## Using request hash in standard log file in Laravel 5.7

If you would like to have request identifier in you standard log, to match log events with request you could add to `config/logging.php`

```php
'tap' => [TomatoPHP\TomatoUserActivities\LogCustomizers\HashLogCustomizer::class],
```

to `daily` channel. The resulted code should looks like

```php
    'channels' => [
        ...

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => 'debug',
            'days' => 14,
            'tap' => [TomatoPHP\TomatoUserActivities\LogCustomizers\HashLogCustomizer::class],
        ],

        ...
    ],
```

This log modifier can be used also in other channels, however it uses extended `LineFormatter`.


## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/VZc8nBJ3ZU)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/plugins/tomato-user-activities)


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Fady Mondy](https://github.com/3x1io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
