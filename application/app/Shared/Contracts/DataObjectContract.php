<?php declare(strict_types=1);

namespace Platform\Shared\Contracts;

interface DataObjectContract
{
    public static function make(mixed ...$props): static;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
