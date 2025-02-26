<?php declare(strict_types=1);

namespace Platform\Accounts\Presentation\Http\Middleware;

use Closure;
use Exception;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Platform\Shared\ConnectionManager\TenantConnectionManager;

final class ConnectToTenant extends Middleware
{
    public function __construct(private TenantConnectionManager $tenantConnection) {}

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $this->tenantConnection->connect($request->account['connection_name']);
        } catch (Exception $e) {
            throw new Exception("Unable to connect to tenant ".$request->account['connection_name']);
        }

        return $next($request);
    }
}
