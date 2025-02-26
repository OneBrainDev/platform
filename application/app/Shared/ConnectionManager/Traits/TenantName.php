<?php declare(strict_types=1);

namespace Platform\Shared\ConnectionManager\Traits;

use Illuminate\Support\Facades\Config;

trait TenantName
{
    public function getTenantName(string $subdomain): string
    {
        return Config::string('paths.db.tenant.prefix').str_replace('-', '_', $subdomain);
    }
}
