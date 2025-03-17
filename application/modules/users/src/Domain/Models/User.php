<?php declare(strict_types=1);

namespace Platform\Users\Domain\Models;

use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use JoeCianflone\ModelProperties\Concerns\HasModelProperties;
use JoeCianflone\ModelProperties\ModelProperties;
use Platform\Users\Database\Factories\UserFactory;
use Platform\Users\Domain\Collections\UserCollection;

#[ModelProperties(
    id: ['uuid', 'is:primary', 'auto-increment' => false],
)]
#[UseFactory(UserFactory::class)]
#[CollectedBy(UserCollection::class)]
class User extends Model
{
    use HasModelProperties;
    use HasUuids;
}
