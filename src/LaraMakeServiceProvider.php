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
    protected function registerConsoleMakeCommand()
    {
        $this->app->singleton('command.console.make', function () {
            return new ConsoleMakeCommand($this->app['files']);
        });
    }

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
    protected function registerEventMakeCommand()
    {
        $this->app->singleton('command.event.make', function () {
            return new EventMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerJobMakeCommand()
    {
        $this->app->singleton('command.job.make', function () {
            return new JobMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerListenerMakeCommand()
    {
        $this->app->singleton('command.listener.make', function () {
            return new ListenerMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMailMakeCommand()
    {
        $this->app->singleton('command.mail.make', function () {
            return new MailMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMiddlewareMakeCommand()
    {
        $this->app->singleton('command.middleware.make', function () {
            return new MiddlewareMakeCommand($this->app['files']);
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
    protected function registerNotificationMakeCommand()
    {
        $this->app->singleton('command.notification.make', function () {
            return new NotificationMakeCommand($this->app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerPolicyMakeCommand()
    {
        $this->app->singleton('command.policy.make', function () {
            return new PolicyMakeCommand($this->app['files']);
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
    protected function registerRequestMakeCommand()
    {
        $this->app->singleton('command.request.make', function () {
            return new RequestMakeCommand($this->app['files']);
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
