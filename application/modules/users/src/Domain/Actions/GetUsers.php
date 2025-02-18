<?php declare(strict_types=1);

namespace Platform\Users\Actions;

use Platform\Shared\Traits\Actionable;
use Platform\Users\Domain\Models\User;
use Platform\Shared\Contracts\ActionContract;

final class GetUsers implements ActionContract
{
    use Actionable;

    public string $modelClass = User::class;

    public function handle(): void
    {
        // return $this->model()->where('active', true)->get();
    }
}
