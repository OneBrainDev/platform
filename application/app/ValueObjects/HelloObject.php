<?php declare(strict_types=1);

namespace Platform\ValueObjects;

use Bag\Bag;
use Platform\Shared\Contracts\ValueObjectContract;

final readonly class HelloObject extends Bag implements ValueObjectContract
{
    public function __construct(
        //
    ) {}

    public static function rules(): array
    {
        return [];
    }
}
