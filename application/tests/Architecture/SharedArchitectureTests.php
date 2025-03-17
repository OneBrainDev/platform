<?php declare(strict_types=1);

arch('Shared Contracts', function (string $module) {
    expect("Platform\\Shared\\Contracts")
      ->toBeInterfaces();
});

arch('Shared Enums', function (string $module) {
    expect("Platform\\Shared\\Enums")
      ->toBeEnums();
});

arch('Shared Traits', function (string $module) {
    expect("Platform\\Shared\\Traits")
      ->toBeTraits();
});
