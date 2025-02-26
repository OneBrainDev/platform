<?php declare(strict_types=1);

namespace Platform\Accounts\Presentation\Http\Middleware;

use Closure;
use Exception;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Platform\Shared\ConnectionManager\DomainManager;
use Platform\Accounts\Domain\Actions\GetAccountBySubdomain;

final class FindTenantAccount extends Middleware
{
    public function __construct(private GetAccountBySubdomain $action) {}

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $manager = new DomainManager($request->host());
            $subdomain = $manager->getSubdomain() ?? throw new Exception('No Subdomains Found');
            $account = $this->action->handle($subdomain);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        $request->merge([
            'account' => $account
        ]);

        return $next($request);
    }
}
