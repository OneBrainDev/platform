<?php declare(strict_types=1);

namespace Platform\Shared\ConnectionManager;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class DomainManager
{
    /** @var array<int, string>  */
    private array $domain;

    public function __construct(
        private string $host
    ) {

        $domainSections = ['topLevel', 'secondLevel', 'subdomain'];
        $hostParts = array_reverse(explode('.', $this->host));

        $this->domain = collect($hostParts)
            ->flatMap(fn ($item, $key) => [
                $domainSections[$key] => $item
            ])->toArray();
    }

    public function getDomain(): string
    {
        return Arr::get($this->domain, 'secondLevel') . "." . Arr::get($this->domain, 'topLevel');
    }

    public function getSubdomain(): string|null
    {
        $sub = Arr::get($this->domain, 'subdomain');

        return (!$sub || $sub === 'www')
            ? null
            : $sub;
    }

    public function isCustomDomain(): bool
    {
        return $this->getDomain() !== Config::string('app.domain')
            ? true
            : false;
    }
}
