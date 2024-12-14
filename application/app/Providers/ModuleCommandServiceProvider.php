<?php declare(strict_types=1);

namespace Platform\Providers;

use Illuminate\Support\ServiceProvider;

final class ModuleCommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Platform\Shared\Console\ModuleCommands\Console\Commands\AnyMakeCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\CastMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ChannelMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ConsoleMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ControllerMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\EventMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ExceptionMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\FactoryMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\JobMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ListenerMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\MailMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\MiddlewareMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\MigrationMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ModelMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ModuleMakeCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ModuleRemoveCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\NotificationMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ObserverMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\PolicyMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\RequestMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ResourceMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\RuleMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\ScopeMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\SeederMakeModuleCommand::class,
                \Platform\Shared\Console\ModuleCommands\Console\Commands\TestMakeModuleCommand::class,
            ]);
        }
    }

    public function register(): void {}
}
