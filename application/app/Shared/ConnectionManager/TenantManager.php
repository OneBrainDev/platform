<?php declare(strict_types=1);

namespace Platform\Shared\ConnectionManager;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Platform\Shared\ConnectionManager\Traits\TenantName;

class TenantManager
{
    use TenantName;

    public function __construct() {}

    public function create(string $subdomain): bool
    {
        $name = $this->getTenantName($subdomain);

        if ($this->exists($subdomain)) {
            throw new Exception('Database already exists');
        }

        return DB::statement("CREATE DATABASE {$name};");
    }


    public function drop(string $subdomain): bool
    {
        $name = $this->getTenantName($subdomain);

        $isDBReady = DB::table('workspaces')
          ->where('subdomain', $subdomain)
          ->where('deleted_on', '>', now())
          ->exists();

        return $isDBReady
          ? DB::statement("DROP DATABASE {$name};")
          : false;
    }

    public function exists(string $subdomain): bool
    {
        $name = $this->getTenantName($subdomain);
        $result = DB::select("SHOW DATABASES LIKE '{$name}'");

        return ! empty($result);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getTenant(string $subdomain): ?array
    {
        return collect(DB::table('account')->where('subdomain', $subdomain)->select('subdomain', 'tenant_connection')->get())->flatten()->toArray();
    }

    /**
     * @return array<int, string>|null
     */
    public function getTenants(): ?array
    {
        return collect(DB::table('account')->select('subdomain', 'tenant_connection')->get())->flatten()->toArray();
    }


    public function markForDelete(string $subdomain): void
    {
        DB::table('accounts')->where('subdomain', $subdomain)->update([
          'deleted_on' => now()
        ]);
    }

    public function rename(string $current, string $update): void
    {
        $oldName = $this->getTenantName($current);
        if (! $this->exists($update)) {
            $this->create(subdomain: $update);
        }

        $username = Config::string('database.connections.mysql.username');
        $password = Config::string('database.connections.mysql.password');

        // DB::transaction(function () use ($username, $password, $update, $oldName): void {
        //     shell_exec("mysqldump --user={$username} --password={$password} {$oldName}");
        //     shell_exec("mysql -u {$username} -p {$password} {$update} < file.sql");

        //     $this->markForDelete($oldName);
        // });

    }

}
