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
        return __DIR__.'/stubs/provider.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
                    ->replaceDefer($stub)
                    ->replaceProvides($stub)
                    ->replaceClass($stub, $name);
    }

    /**
     * Add the $defer value for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceDefer(&$stub)
    {
        if ($table = $this->option('defer')) {
            $deferCode = "/**\n" .
                     "     * Indicates if loading of the provider is deferred.\n" .
                     "     *\n" .
                     "     * @var bool\n" .
                     "     */\n" .
                     "    protected \$defer = true;";
            $stub = str_replace('DummyDefer', $deferCode, $stub);
        }

        return $this;
    }

    /**
     * Add the provides() method for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceProvides(&$stub)
    {
        if ($table = $this->option('defer')) {
            $providesCode = "/**\n" .
                        "     * Get the services provided by the provider.\n" .
                        "     *\n" .
                        "     * @return array\n" .
                        "     */\n" .
                        "    public function provides()\n" .
                        "    {\n" .
                        "        return [];\n" .
                        "    }\n";
            $stub = str_replace('DummyProvides', $providesCode, $stub);
        }

        return $this;
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
