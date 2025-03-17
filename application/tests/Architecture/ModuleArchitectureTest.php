<?php declare(strict_types=1);

arch('Module Actions', function (string $module) {
    expect("Platform\\{$module}\\Domain\\Actions")
      ->classes()
      ->toBeFinal()
      ->toUseTrait('Platform\Shared\Traits\Actionable')
      ->toImplement('Platform\Shared\Contracts\ActionContract')
      ->not->toHavePublicMethodsBesides('handle')
      ->not->toHaveProtectedMethods()
      ->toExtendNothing();
})->with('modulenamespaces');

arch('Module Contracts', function (string $module) {
    expect("Platform\\{$module}\\Contracts")
        ->toBeInterfaces();
})->with('modulenamespaces');

arch('Module DataObjects', function (string $module) {
    expect("Platform\\{$module}\\DataObjects")
      ->classes()
      ->toBeFinal()
      ->toBeReadOnly()
      ->toOnlyImplement("Platform\\Shared\\Contracts\\DataObjectContract")
      ->toHaveConstructor()
      ->not->toHavePrivateMethodsBesides(['__construct'])
      ->toHaveSuffix('Data');
})->with('modulenamespaces');

arch('Module Domain Collections', function (string $module) {
    expect("Platform\\{$module}\\Domain\\Collections")
        ->classes()
        ->toExtend('Illuminate\Database\Eloquent\Collection')
        ->toHaveSuffix('Collection');
})->with('modulenamespaces');

arch('Module ValueObjects', function (string $module) {
    expect("Platform\\{$module}\\Domain\\ValueObjects")
      ->classes()
      ->toBeFinal()
      ->toBeReadOnly()
      ->toImplement('Platform\Shared\Contracts\ValueObjectContract')
      ->toExtend('Bag\\Bag')
      ->toHaveSuffix('Object');
})->with('modulenamespaces');

arch('Models', function (string $module) {
    expect("Platform\\{$module}\\Domain\\Models")
      ->classes()
      ->toExtend('Illuminate\Database\Eloquent\Model');
})->with('modulenamespaces');

arch('Controllers', function (string $module) {
    expect("Platform\\{$module}\\Presentation\\Http\Controllers")
      ->classes()
      ->toBeFinal()
      ->toBeInvokable()
      ->toOnlyBeUsedIn("Platform\\{$module}\\Presentation\\Http\Controllers")
      ->not->toHavePublicMethodsBesides(['__invoke', '__construct'])
      ->toHaveSuffix('Controller');
})->with('modulenamespaces');

arch('Requests', function (string $module) {
    expect("Platform\\{$module}\\Presentation\\Http\\Requests")
      ->classes()
      ->toExtend('Illuminate\Foundation\Http\FormRequest')
      ->toUseTrait('Platform\Shared\Traits\RequestToDto')
      ->toHaveSuffix('Request');
})->with('modulenamespaces');

arch('Services', function (string $module) {
    expect("Platform\\{$module}\\Services\\Jobs")
      ->classes()
      ->toImplement('Illuminate\Contracts\Queue\ShouldQueue')
      ->toBeFinal()
      ->toHaveSuffix('Service');
})->with('modulenamespaces');

arch('Repositories', function (string $module) {
    expect("Platform\\{$module}\\Domain\\Repositories")
      ->classes()
      ->toExtend('Platform\Shared\Abstractions\Repository')
      ->toBeFinal()
      ->not->toHavePrivateMethods()
      ->not->toHavePublicMethods()
      ->not->toHaveProtectedMethods()
      ->toHaveSuffix('Repository');
})->with('modulenamespaces');
