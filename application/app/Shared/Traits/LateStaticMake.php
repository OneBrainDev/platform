<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

trait LateStaticMake
{
    public static function make(mixed ...$props): static
    {
        return new static(...$props);
    }
}
