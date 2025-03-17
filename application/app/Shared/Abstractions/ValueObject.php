<?php declare(strict_types=1);

namespace Platform\Shared\Abstractions;

use Bag\Bag;
use Platform\Shared\Contracts\ValueObjectContract;

abstract readonly class ValueObject extends Bag implements ValueObjectContract {}
