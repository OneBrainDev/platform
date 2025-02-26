<?php declare(strict_types=1);

namespace Platform\Accounts\Services\Jobs;

use Bag\Exceptions\InvalidBag;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Platform\Shared\Contracts\ServiceContract;
use Platform\Accounts\Domain\Actions\SaveAccount;
use Platform\Shared\Contracts\DataObjectContract;
use Platform\Accounts\Domain\ValueObjects\AccountObject;

final class SavesAccountService implements ShouldQueue, ServiceContract
{
    use Queueable;

    public function __construct(private DataObjectContract $data) {}

    public function handle(SaveAccount $action): true
    {
        try {
            $accountObject = AccountObject::from($this->data->toArray());
            $action->handle($accountObject);
        } catch (InvalidBag $exception) {

        }

        return true;
    }
}
