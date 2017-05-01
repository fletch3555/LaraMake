<?php

namespace TheFletcher\LaraMake\Console\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand as IlluminateProviderMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class ProviderMakeCommand extends IlluminateProviderMakeCommand
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
        if ($this->option('defer')) {
            return __DIR__.'/stubs/provider.deferred.stub';
        }

        return __DIR__.'/stubs/provider.stub';
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
                ['defer', 'd', InputOption::VALUE_NONE, 'Defer loading of the provider'],
            ]
        );
    }
}
