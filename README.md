<p align="center"><h1>LaraMake</h1></p>

## About LaraMake

LaraMake is a package that overrides the built-in artisan **_make_** commands to add command options that we believe should have been included out-of-the-box, but weren't.

Laravel doesn't want to _bloat_ their commands with too many flags, so we'll do it for them!


## Licensing

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

This command creates a Model class.

New options include:

Long                      | Short        | Example                  | Purpose
------------------------- | ------------ | ------------------------ | -------
`--namespace={namespace}` |              | `--namespace=App\Models` | Set the namespace to put the model in.
`--table={table}`         | `-t={table}` | `--table=products`       | Set the table name for the model to use.
`--no-timestamps`         |              | `--no-timestamps`        | Set `$timestamps=false` to tell the model not to expect `created_at` or `updated_at` fields.
`--primarykey={key}`      | `-k={key}`   | `--primarykey=id`        | Set a custom primary key for the model.
`--no-incrementing`       |              | `--no-incrementing`      | Set `$incrementing = false` to tell the model that it's primary key is not auto-incrementing.
`--connection={conn}`     |              | `--connection=mongodb`   | Set the `$connection` the model should use.

### make:provider

This command creates a ServiceProvider class.

New options include:

Long      | Short | Example   | Purpose
--------- | ----- | --------- | -------
`--defer` | `-d`  | `--defer` | Set `$defer` to defer loading of the Provider.
