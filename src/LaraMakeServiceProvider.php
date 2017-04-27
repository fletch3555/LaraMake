<?php

namespace TheFletcher\LaraMake;

use Illuminate\Foundation\Providers\ArtisanServiceProvider;

use TheFletcher\LaraMake\Console\Commands\ModelMakeCommand;

class LaraMakeServiceProvider extends ArtisanServiceProvider
{

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $devCommands = [
        'ModelMake' => 'command.model.make',
    ];

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerModelMakeCommand()
    {
        $this->app->extend('command.model.make', function ($app) {
            return new ModelMakeCommand($app['files']);
        });
    }
}
