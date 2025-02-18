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
    expect("Platform\\{$module}\\Domain\\DataObjects")
      ->classes()
      ->toBeFinal()
      ->toBeReadOnly()
      ->toOnlyImplement("Platform\\Shared\\Contracts\\DataObjectContract")
      ->toHaveConstructor()
      ->not->toHavePrivateMethodsBesides(['__construct'])
      ->toHaveSuffix('Data');
})->with('modulenamespaces');

arch('Module Domain Collections', function (string $module) {
    expect("Platform\\{$module}\\Domain\\Collections");
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
      ->classes();
})->with('modulenamespaces');

arch('Controllers', function (string $module) {
    expect("Platform\\{$module}\\Http\Controllers")
      ->classes()
      ->toBeFinal()
      ->toBeInvokable()
      ->toOnlyBeUsedIn("Platform\\{$module}\\Http\Controllers")
      ->not->toHavePublicMethodsBesides(['__invoke', '__construct'])
      ->toHaveSuffix('Controller');
})->with('modulenamespaces');

arch('Requests', function (string $module) {
    expect("Platform\\{$module}\\Http\\Requests")
      ->classes();
})->with('modulenamespaces');

arch('Services', function (string $module) {
    expect("Platform\\{$module}\\Services")
      ->classes()
      ->toImplement('Illuminate\Contracts\Queue\ShouldQueue')
      ->toBeFinal()
      ->toHaveSuffix('Service');
})->with('modulenamespaces');
