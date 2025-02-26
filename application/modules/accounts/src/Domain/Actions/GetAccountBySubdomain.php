<?php declare(strict_types=1);

namespace Platform\Accounts\Domain\Actions;

use Exception;
use Platform\Shared\Traits\Actionable;
use Platform\Accounts\Domain\Models\Account;
use Platform\Shared\Contracts\ActionContract;
use Platform\Accounts\Domain\ValueObjects\AccountObject;

final class GetAccountBySubdomain implements ActionContract
{
    use Actionable;

    private string $modelClass = Account::class;

    public function handle(string $subdomain): AccountObject
    {
        try {
            $account = $this->model()->where('subdomain', $subdomain)->firstOrFail();
        } catch (Exception $e) {
            throw new Exception('Unable to find account by subdomain: '. $subdomain);
        }

        return AccountObject::from($account->toArray());
    }
}
