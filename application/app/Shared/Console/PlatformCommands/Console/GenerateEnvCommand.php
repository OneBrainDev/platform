<?php declare(strict_types=1);

namespace Platform\Shared\Console\PlatformCommands\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

class GenerateEnvCommand extends Command
{
    private const string REPLACE_END = "}}#";

    private const string REPLACE_START = "#{{";
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all the ENV files from the .env.example files';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:env {--oldNamespace=} {--newNamespace=}';

    /**
     * @param array<string, string>  $config
     */
    public function __construct(
        private Filesystem $files,
        private array $config = []
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->config = $this->getConfig();

        // Namespace: optional
        $this->replaceNamespace($this->option('oldNamespace'), $this->option('newNamespace'));

        // top
        $this->replaceEnv('/../.env.example', '/../.env');
        $this->info('created .env file for docker');

        // docker-compose
        $this->replaceEnv('/../.infrastructure/stubs/docker-compose.stub', '/../docker-compose.yml');
        $this->replaceEnv('/../.infrastructure/stubs/docker-compose.dev.stub', '/../docker-compose.dev.yml');
        $this->info('created docker compose files');

        // laravel
        $this->replaceEnv('.env.example', '.env');
        $this->info('created .env file for laravel');

        // web
        $this->replaceEnv('/../frontend/web/.env.example', '/../frontend/web/.env');
        $this->info('created .env file for web');

        // init db
        $this->replaceEnv('/../.infrastructure/stubs/init.stub', '/../.infrastructure/conf/mysql/init.sql');
        $this->info('created init.db file for mysql');

        // vite
        $this->replaceEnv('/../.infrastructure/stubs/vite.config.stub', '/../frontend/web/vite.config.ts');
        $this->info('created vite.config.ts file');

        return 0;
    }

    /**
     * @return array<string, mixed>
     */
    private function getConfig(): array
    {
        return Collection::make((array) json_decode($this->files->get(base_path('/../platform.config.json')), true))->flatMap(function ($v, $k) {
            return [self::REPLACE_START . $k . self::REPLACE_END => $v];
        })->toArray();
    }

    private function replaceEnv(string $stub, string $filepath): void
    {
        $stub = $this->files->get(base_path($stub));
        $stub = str_replace(array_keys($this->config), array_values($this->config), $stub);

        $this->files->put(base_path($filepath), $stub);
    }

    private function replaceNamespace(?string $oldNamespace = null, ?string $newNamespace = null): void
    {
        if ($oldNamespace && $newNamespace) {
            $this->info("Updating Namespace: $oldNamespace to $newNamespace");

            shell_exec("egrep -rl '$oldNamespace\\\\' ./ | xargs -I@ sed -i '' 's/$oldNamespace\\\\/$newNamespace\\\\/g' @");
        }
    }
}
