<p align="center"><h1>LaraMake</h1></p>

## About LaraMake

LaraMake is a package that overrides the built-in artisan **_make_** commands to add command options that we believe should have been included out-of-the-box, but weren't.

Laravel doesn't want to _bloat_ their commands with too many flags, so we'll do it for them!


## Installation

Require the package with Composer:

```bash
composer require thefletcher/laramake
```

Add the Service Provider to `config/app.php`:

```php
'providers' => [
    // Laravel Framework Service Providers...
    // ...
    
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

Long                      | Short        | Purpose                                                                                       | Example
------------------------- | ------------ | --------------------------------------------------------------------------------------------- | -------
`--namespace={namespace}` |              | Set the namespace to put the model in.                                                        | `--namespace=App\Models`
`--table={table}`         | `-t={table}` | Set the table name for the model to use.                                                      | `--table=products`
`--no-timestamps`         |              | Set `$timestamps=false` to tell the model not to expect `created_at` or `updated_at` fields.  | `--no-timestamps`
`--primarykey={key}`      | `-k={key}`   | Set a custom primary key for the model.                                                       | `--primarykey=id`
`--no-incrementing`       |              | Set `$incrementing = false` to tell the model that it's primary key is not auto-incrementing. | `--no-incrementing`
`--connection={conn}`     |              | Set the `$connection` the model should use.                                                   | `--connection=mongodb`

### make:provider

This command creates a ServiceProvider class.

New options include:

Long      | Short | Purpose                                        | Example
--------- | ----- | ---------------------------------------------- | -------
`--defer` | `-d`  | Set `$defer` to defer loading of the Provider. | `--defer`


## Contributing

If there are any options you wish Laravel had and would like added here, please [create an issue through Github](https://github.com/fletch3555/LaraMake/issues/new).

If you wish to work on adding new options, I welcome Pull Requests, but only after discussion in an issue first.


## Licensing

Much like the Laravel Framework, this package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
