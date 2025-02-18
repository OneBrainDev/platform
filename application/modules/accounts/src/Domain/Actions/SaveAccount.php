<?php declare(strict_types=1);

namespace Platform\Accounts\Domain\Actions;

use Platform\Shared\Traits\Actionable;
use Platform\Accounts\Domain\Models\Account;
use Platform\Shared\Contracts\ActionContract;
use Platform\Accounts\Domain\ValueObjects\AccountObject;

final class SaveAccount implements ActionContract
{
    use Actionable;

    private string $modelClass = Account::class;

    public function handle(AccountObject $valueObject): void
    {
        $this->model()->save($valueObject->toArray());
    }
}
