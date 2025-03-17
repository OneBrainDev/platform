<?php declare(strict_types=1);

namespace Platform\Users\Services;

use Platform\Shared\Traits\HasRepository;
use Platform\Users\Contracts\UserRepository;
use Platform\Shared\Contracts\ServiceContract;
use Platform\Shared\Contracts\DataObjectContract;

final class Hello implements ServiceContract
{
    use HasRepository;

    private string $repo = UserRepository::class;

    public function handle(DataObjectContract $dto): mixed
    {
        //
        return true;
    }
}
