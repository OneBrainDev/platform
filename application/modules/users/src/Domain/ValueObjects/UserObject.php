<?php declare(strict_types=1);

namespace Platform\Users\Domain\ValueObjects;

use Bag\Bag;
use Ramsey\Uuid\Uuid;
use Platform\Shared\Contracts\ValueObjectContract;

final readonly class UserObject extends Bag implements ValueObjectContract
{
    public function __construct(
        public Uuid $id,
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
