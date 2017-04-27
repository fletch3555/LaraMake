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
        if ($table = $this->option('table')) {
            $stub = str_replace('DummyTable', "protected \$table = '" . $table . "';", $stub);
        }

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
        if ($this->option('no-timestamps')) {
            $stub = str_replace('DummyTimestamps', "public \$timestamps = false;", $stub);
        }

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
        if ($pk = $this->option('primarykey')) {
            $stub = str_replace('DummyPrimaryKey', "protected \$primaryKey  = '" . $pk . "';", $stub);
        }

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
        if ($this->option('no-incrementing')) {
            $stub = str_replace('DummyIncrementing', "public \$incrementing = false;", $stub);
        }

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
        if ($conn = $this->option('connection')) {
            $stub = str_replace('DummyConnection', "protected \$connection = '". $conn ."';", $stub);
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
                ['table', 't', InputOption::VALUE_REQUIRED, 'Set the table name for the model.'],
                ['no-timestamps', null, InputOption::VALUE_NONE, 'Set model to not use timestamps.'],
                ['primarykey', 'k', InputOption::VALUE_REQUIRED, 'Set the primary key field for the model.'],
                ['no-incrementing', null, InputOption::VALUE_NONE, 'Set model primary key to non-incrementing.'],
                ['connection', null, InputOption::VALUE_REQUIRED, 'Set the DB connection name for the model.'],
            ]
        );
    }
}
