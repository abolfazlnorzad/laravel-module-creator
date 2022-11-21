<?php

namespace Nrz\LaravelModuleCreator\Commands\Graphql;

use Exception;
use Nrz\LaravelModuleCreator\Traits\GraphqlCommand;
use Nrz\LaravelModuleCreator\Traits\RequireModule;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class MakeModuleGraphqlQuery extends GeneratorCommand
{
    use RequireModule , GraphqlCommand;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make:graphql-query';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'module:make:graphql-query';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Graphql Query class for the module';

    /**
     * Get the destination class path.
     *
     * @param string $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return base_path("modules/{$this->argument('module')}/src/Graphql/Queries") . '/' . str_replace('\\', '/', $name) . '.php';
    }


    protected function rootNamespace()
    {
        return str_replace('/', '\\', $this->argument('module')) . '\Graphql\Queries';
    }

    protected function getStub()
    {
        return __DIR__ . '/../../Stubs/Graphql/query.stub';
    }
}
