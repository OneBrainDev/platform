<?php declare(strict_types=1);

dataset('modulenamespaces', function () {
    return collect(glob('modules/*'))
      ->map(fn (string $dir, int $key): string => ucfirst(str_replace('modules/', '', $dir)))
      ->toArray();
});
