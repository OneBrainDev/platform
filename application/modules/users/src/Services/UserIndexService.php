<?php declare(strict_types=1);

namespace Platform\Users\Services;

use Platform\Shared\Traits\LateStaticMake;
use Illuminate\Contracts\Queue\ShouldQueue;
use Platform\Shared\Traits\DispatchService;

final readonly class UserIndexService implements ShouldQueue
{
    use DispatchService;
    use LateStaticMake;

    public function __construct(
        public string $name
    ) {}

    public function handle(): string
    {
        echo "hello there, $this->name";
        return $this->name;
    }

}
