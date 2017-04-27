<?php

namespace TheFletcher\LaraMake\Console\Commands;

use Illuminate\Foundation\Console\TestMakeCommand as IlluminateTestMakeCommand;

class TestMakeCommand extends IlluminateTestMakeCommand
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
        return __DIR__.'/stubs/test.stub';
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
