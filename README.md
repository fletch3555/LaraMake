<p align="center"><h1>LaraMake</h1></p>

## About LaraMake

LaraMake is a package that overrides the built-in artisan **_make_** commands to add command options that we believe should have been included out-of-the-box, but weren't.

Taylor doesn't want to _bloat_ Laravel's commands with too many flags, so we'll do it for him! 

Much like the Laravel Framework, this package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Installation

Require the package with Composer:

```bash
composer require thefletcher/laramake
```

Add the Service Provider to `config/app.php`:

```php
'providers' => [
    // Laravel Framework Service Providers...
    //...
    
    // Package Service Providers
    TheFletcher\LaraMake\LaraMakeServiceProvider::class,
    // ...
    
    // Application Service Providers
    // ...
],
```

Verify that Artisan is using the new commands:

```bash
php artisan make:model --help
```

You should see new options available, including `--table`

## Documentation

Below are the commands that have been overridden and what options were added.

### make:model

This command creates a Model class under the app/

### make:provider