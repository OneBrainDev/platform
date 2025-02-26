<?php declare(strict_types=1);

namespace Platform\Accounts\DataObjects;

use Platform\Shared\Traits\CanMakeArray;
use Platform\Shared\Traits\LateStaticMake;
use Platform\Shared\Contracts\DataObjectContract;

final readonly class StoreAccountData implements DataObjectContract
{
    use CanMakeArray;
    use LateStaticMake;

    private function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
