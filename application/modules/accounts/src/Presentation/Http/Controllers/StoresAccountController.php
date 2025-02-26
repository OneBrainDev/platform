<?php declare(strict_types=1);

namespace Platform\Accounts\Presentation\Http\Controllers;

use Throwable;
use Illuminate\Http\RedirectResponse;
use Platform\Accounts\DataObjects\StoreAccountData;
use Platform\Accounts\Services\Jobs\SavesAccountService;
use Platform\Accounts\Presentation\Http\Requests\StoresAccountRequest;

final class StoresAccountController
{
    public function __construct(
    ) {}

    public function __invoke(StoresAccountRequest $request): RedirectResponse
    {
        try {
            // dispatch_sync(SavesAccountService::class, $request->toDto(StoreAccountData::class))
            SavesAccountService::dispatchSync($request->toDto(StoreAccountData::class));
        } catch (Throwable $e) {
            return back()->withError('oh no');
        }
        return back()->withSuccess('Congrats');
    }
}
