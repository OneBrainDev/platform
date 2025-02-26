<?php declare(strict_types=1);

namespace Platform\Shared\Helpers;

use Illuminate\Support\Facades\Config;

class ModuleHelper
{
    private string $modulePath;

    public function __construct()
    {
        $this->modulePath = Config::string('modules.module_folder');
    }

    /**
     * @return array<int, string>
     */
    public function getModuleNames(): array
    {
        $modules = !!glob($this->modulePath . '/*') ? glob($this->modulePath . '/*') : [];

        return collect($modules)
            ->map(
                fn (string|false $dir): string => !!$dir
                    ? str_replace($this->modulePath . '/', '', $dir)
                    : ''
            )
            ->toArray();
    }

}
