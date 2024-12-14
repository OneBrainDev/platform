<?php declare(strict_types=1);

dataset('modulenamespaces', function () {
    return collect(glob('modules/*'))
      ->map(fn ($dir, $key) => ucfirst(str_replace('modules/', '', $dir)))
      ->toArray();
});
