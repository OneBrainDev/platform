<?php declare(strict_types=1);

arch('Module Actions', function (string $module) {
    expect("Platform\\{$module}\\Actions")
      ->classes()
      ->toBeFinal()
      ->toUseTrait('Platform\Shared\Traits\Actionable')
      ->not->toHavePublicMethodsBesides('handle')
      ->not->toHaveProtectedMethods()
      ->toImplementNothing()
      ->toExtendNothing();
})->with('modulenamespaces');

arch('Module Contracts', function (string $module) {
    expect("Platform\\{$module}\\Contracts")
      ->toBeInterfaces();
})->with('modulenamespaces');

arch('Module DTOs', function (string $module) {
    expect("Platform\\{$module}\\Domain\\DTOs")
      ->toBeFinal()
      ->toBeReadonly()
      ->toOnlyImplement("Platform\\Shared\\Contracts\\BaseDTOContract");
})->with('modulenamespaces');

arch('Module Domain Collections', function (string $module) {
    expect("Platform\\{$module}\\Domain\\Collections");
})->with('modulenamespaces');

arch('DataObjects', function (string $module) {
    expect("Platform\\{$module}\\Domain\\DataObjects")
      ->classes()
      ->toExtend('Bag\\Bag');
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
      ->toBeReadonly()
      ->toHaveSuffix('Service');
})->with('modulenamespaces');





// arch('DTOs', function (string $module) {
//   expect("Platform\\{$module}\\Domain\\DataObjects")
//     ->classes();
// })->with('modulenamespaces');
