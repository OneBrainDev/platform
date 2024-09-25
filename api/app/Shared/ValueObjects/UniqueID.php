<?php declare(strict_types=1);

namespace Platform\Shared\ValueObjects;

use Platform\Shared\Contracts\ValueObjectContract;

final readonly class UniqueID implements ValueObjectContract
{
    public function __construct(
        public string $id
    ) {}

    public function __toString(): string
    {
        return $this->id;
    }
}
