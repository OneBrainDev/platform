<?php declare(strict_types=1);

namespace Platform\Accounts\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use JoeCianflone\ModelProperties\ModelProperties;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use JoeCianflone\ModelProperties\Concerns\HasModelProperties;

#[ModelProperties(
    id: ['uuid'],
    name: ['string'],
    email: ['string'],
    password: ['hash'],
)]
class Account extends Model
{
    use HasModelProperties;
    use HasUuids;
}
