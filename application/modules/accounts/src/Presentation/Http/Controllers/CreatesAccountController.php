<?php declare(strict_types=1);

namespace Platform\Accounts\Presentation\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

final class CreatesAccountController
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Accounts/CreateAccountPage');
    }
}
