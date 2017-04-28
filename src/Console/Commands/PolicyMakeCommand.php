<?php

namespace TheFletcher\LaraMake\Console\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand as IlluminatePolicyMakeCommand;

class PolicyMakeCommand extends IlluminatePolicyMakeCommand
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
        return __DIR__.'/stubs/policy.stub';
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
