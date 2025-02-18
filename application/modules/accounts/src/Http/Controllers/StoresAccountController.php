<?php declare(strict_types=1);

namespace Platform\Accounts\Http\Controllers;

use Throwable;
use Illuminate\Http\RedirectResponse;
use Platform\Accounts\Services\SavesAccountService;
use Platform\Accounts\Http\Requests\StoresAccountRequest;
use Platform\Accounts\Domain\DataObjects\StoreAccountData;

final class StoresAccountController
{
    public function __construct(
    ) {}

    public function __invoke(StoresAccountRequest $request): RedirectResponse
    {
        try {
            SavesAccountService::dispatchSync($request->toDto(StoreAccountData::class));
        } catch (Throwable $e) {
            return back()->withError('oh no');
        }
        return back()->withSuccess('Congrats');
    }
}
