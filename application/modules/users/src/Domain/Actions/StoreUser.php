<?php declare(strict_types=1);

namespace Platform\Users\Domain\Actions;

use Platform\Users\Domain\Models\User;
use Platform\Shared\Traits\HasEloquentModel;
use Platform\Shared\Contracts\ActionContract;
use Platform\Shared\Contracts\ValueObjectContract;

final class StoreUser implements ActionContract
{
    use HasEloquentModel;

    public string $modeling = User::class;

    public function handle(ValueObjectContract|null $vo = null): void
    {
        $this->model()->save();
    }
}
