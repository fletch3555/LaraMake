<?php

namespace TheFletcher\LaraMake\Console\Commands;

use Illuminate\Foundation\Console\NotificationMakeCommand as IlluminateNotificationMakeCommand;

class NotificationMakeCommand extends IlluminateNotificationMakeCommand
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/notification.stub';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge(parent::getOptions(),
            [
            ]
        );
    }
}
