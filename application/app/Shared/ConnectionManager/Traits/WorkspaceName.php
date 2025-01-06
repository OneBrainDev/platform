<?php declare(strict_types=1);

namespace Platform\Shared\ConnectionManager\Traits;

use Illuminate\Support\Facades\Config;

trait WorkspaceName
{
    public function getWorkspaceName(string $subdomain): string
    {
        return Config::string('paths.db.workspace.prefix').str_replace('-', '_', $subdomain);
    }
}
