<?php

namespace TheFletcher\LaraMake;

use Illuminate\Foundation\Providers\ArtisanServiceProvider;

use TheFletcher\LaraMake\Console\Commands\ConsoleMakeCommand;
use TheFletcher\LaraMake\Console\Commands\ControllerMakeCommand;
use TheFletcher\LaraMake\Console\Commands\EventMakeCommand;
use TheFletcher\LaraMake\Console\Commands\JobMakeCommand;
use TheFletcher\LaraMake\Console\Commands\ListenerMakeCommand;
use TheFletcher\LaraMake\Console\Commands\MailMakeCommand;
use TheFletcher\LaraMake\Console\Commands\MiddlewareMakeCommand;
use TheFletcher\LaraMake\Console\Commands\MigrateMakeCommand;
use TheFletcher\LaraMake\Console\Commands\ModelMakeCommand;
use TheFletcher\LaraMake\Console\Commands\NotificationMakeCommand;
use TheFletcher\LaraMake\Console\Commands\PolicyMakeCommand;
use TheFletcher\LaraMake\Console\Commands\ProviderMakeCommand;
use TheFletcher\LaraMake\Console\Commands\RequestMakeCommand;
use TheFletcher\LaraMake\Console\Commands\SeederMakeCommand;
use TheFletcher\LaraMake\Console\Commands\TestMakeCommand;

class LaraMakeServiceProvider extends ArtisanServiceProvider
{

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerControllerMakeCommand()
    {
        $this->app->singleton('command.controller.make', function () {
            return new ControllerMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateMakeCommand()
    {
        $this->app->singleton('command.migrate.make', function () {
            // Once we have the migration creator registered, we will create the command
            // and inject the creator. The creator is responsible for the actual file
            // creation of the migrations, and may be extended by these developers.
            $creator = $this->app['migration.creator'];

            $composer = $this->app['composer'];

            return new MigrateMakeCommand($creator, $composer);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerModelMakeCommand()
    {
        $this->app->singleton('command.model.make', function () {
            return new ModelMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerProviderMakeCommand()
    {
        $this->app->singleton('command.provider.make', function () {
            return new ProviderMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerTestMakeCommand()
    {
        $this->app->singleton('command.test.make', function () {
            return new TestMakeCommand($this->app['files']);
        });
    }
}
