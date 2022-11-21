<?php namespace Nrz\LaravelModuleCreator;


use Nrz\LaravelModuleCreator\Commands\Custom\MakeModuleRepo;
use Nrz\LaravelModuleCreator\Commands\Graphql\MakeModuleGraphqlMutation;
use Nrz\LaravelModuleCreator\Commands\Graphql\MakeModuleGraphqlQuery;
use Nrz\LaravelModuleCreator\Commands\Graphql\MakeModuleGraphqlType;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleController;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleEvent;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleException;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleJob;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleListener;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleMigration;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleModel;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleNotification;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleRule;
use Nrz\LaravelModuleCreator\Commands\Laravel\MakeModuleSeeder;
use Nrz\LaravelModuleCreator\Commands\MakeModule;
use Illuminate\Support\ServiceProvider;

class LaravelModuleCreatorServiceProvider extends  ServiceProvider
{
    public function register()
    {
        $this->registerCommands();
    }

    public function registerCommands()
    {
        $commands = [
            MakeModule::class,
            MakeModuleMigration::class,
            MakeModuleModel::class,
            MakeModuleSeeder::class,
            MakeModuleController::class,
            MakeModuleRepo::class,
            MakeModuleRule::class,
            MakeModuleEvent::class,
            MakeModuleListener::class,
            MakeModuleJob::class,
            MakeModuleNotification::class,
            MakeModuleException::class
        ];

        if(class_exists("Rebing\GraphQL\Support\Facades\GraphQL")) {
            $commands = array_merge($commands, [
                MakeModuleGraphqlType::class,
                MakeModuleGraphqlMutation::class,
                MakeModuleGraphqlQuery::class
            ]);
        }

        $this->commands($commands);
    }

}
