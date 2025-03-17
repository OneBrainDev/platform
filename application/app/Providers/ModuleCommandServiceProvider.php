<?php declare(strict_types=1);

namespace Platform\Providers;

use Illuminate\Support\ServiceProvider;
use Platform\Shared\Console\ModuleCommands\Console\Commands\AnyMakeCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ModuleMakeCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ModuleRemoveCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\JobMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\CastMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\MailMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\RuleMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\TestMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\EventMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ModelMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\QueryMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ScopeMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ActionMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\PolicyMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\SeederMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ChannelMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ConsoleMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\FactoryMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\RequestMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ServiceMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ListenerMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ObserverMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ResourceMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ExceptionMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\MigrationMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\CollectionMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ControllerMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\DataObjectMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\MiddlewareMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\RepositoryMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\ValueObjectMakeModuleCommand;
use Platform\Shared\Console\ModuleCommands\Console\Commands\NotificationMakeModuleCommand;

final class ModuleCommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ActionMakeModuleCommand::class,
                AnyMakeCommand::class,
                CastMakeModuleCommand::class,
                ChannelMakeModuleCommand::class,
                CollectionMakeModuleCommand::class,
                ConsoleMakeModuleCommand::class,
                ControllerMakeModuleCommand::class,
                DataObjectMakeModuleCommand::class,
                EventMakeModuleCommand::class,
                ExceptionMakeModuleCommand::class,
                FactoryMakeModuleCommand::class,
                JobMakeModuleCommand::class,
                ListenerMakeModuleCommand::class,
                MailMakeModuleCommand::class,
                MiddlewareMakeModuleCommand::class,
                MigrationMakeModuleCommand::class,
                ModelMakeModuleCommand::class,
                ModuleMakeCommand::class,
                ModuleRemoveCommand::class,
                NotificationMakeModuleCommand::class,
                ObserverMakeModuleCommand::class,
                PolicyMakeModuleCommand::class,
                QueryMakeModuleCommand::class,
                RepositoryMakeModuleCommand::class,
                RequestMakeModuleCommand::class,
                ResourceMakeModuleCommand::class,
                RuleMakeModuleCommand::class,
                ScopeMakeModuleCommand::class,
                SeederMakeModuleCommand::class,
                ServiceMakeModuleCommand::class,
                TestMakeModuleCommand::class,
                ValueObjectMakeModuleCommand::class,
            ]);
        }
    }

    public function register(): void {}
}
