<?php declare(strict_types=1);

namespace Platform\Users\Actions;

use Platform\Users\Domain\Models\User;
use Platform\Shared\Traits\Actionable;

final class GetUsers
{
    use Actionable;

    public string $modelClass = User::class;

    public function handle(): void
    {

        // return $this->model()->where('active', true)->get();
    }
}
