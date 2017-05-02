<?php

namespace TheFletcher\LaraMake\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as IlluminateModelMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends IlluminateModelMakeCommand
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
        return __DIR__.'/stubs/model.stub';
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
                    ->replaceTable($stub)
                    ->replaceTimestamps($stub)
                    ->replacePrimaryKey($stub)
                    ->replaceIncrementing($stub)
                    ->replaceConnection($stub)
                    ->replaceClass($stub, $name);
    }

    /**
     * Add the $table value for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceTable(&$stub)
    {
        $replacement = '';

        if ($table = $this->option('table')) {
            $replacement = "    protected \$table = '" . $table . "';";
        }

        $stub = str_replace("\n    DummyTable", $replacement, $stub);

        return $this;
    }

    /**
     * Set the $timestamps value for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceTimestamps(&$stub)
    {
        $replacement = '';

        if ($this->option('no-timestamps')) {
            $replacement = "    public \$timestamps = false;";
        }

        $stub = str_replace("\n    DummyTimestamps", $replacement, $stub);

        return $this;
    }

    /**
     * Set the $primaryKey value for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replacePrimaryKey(&$stub)
    {
        $replacement = '';

        if ($pk = $this->option('primarykey')) {
            $replacement = "    protected \$primaryKey  = '" . $pk . "';";
        }

        $stub = str_replace("\n    DummyPrimaryKey", $replacement, $stub);

        return $this;
    }

    /**
     * Set the $incrementing value for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceIncrementing(&$stub)
    {
        $replacement = '';

        if ($this->option('no-incrementing')) {
            $replacement = "    public \$incrementing = false;";
        }

        $stub = str_replace("\n    DummyIncrementing", $replacement, $stub);

        return $this;
    }

    /**
     * Set the $connection value for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceConnection(&$stub)
    {
        $replacement = '';

        if ($conn = $this->option('connection')) {
            $replacement = "    protected \$connection = '". $conn ."';";
        }

        $stub = str_replace("\n    DummyConnection", $replacement, $stub);

        return $this;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($table = $this->option('namespace')) {
            $rootNamespace = str_replace('/', '\\', $this->option('namespace'));
        }

        return $rootNamespace;
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
                ['namespace', null, InputOption::VALUE_REQUIRED, 'Set the model namespace'],
                ['table', 't', InputOption::VALUE_REQUIRED, 'Set the table name for the model.'],
                ['no-timestamps', null, InputOption::VALUE_NONE, 'Set model to not use timestamps.'],
                ['primarykey', 'k', InputOption::VALUE_REQUIRED, 'Set the primary key field for the model.'],
                ['no-incrementing', null, InputOption::VALUE_NONE, 'Set model primary key to non-incrementing.'],
                ['connection', null, InputOption::VALUE_REQUIRED, 'Set the DB connection name for the model.'],
            ]
        );
    }
}
