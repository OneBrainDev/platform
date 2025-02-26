<?php declare(strict_types=1);

namespace Platform\Accounts\Domain\Models;

use Database\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Model;
use JoeCianflone\ModelProperties\ModelProperties;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Platform\Accounts\Domain\Collections\AccountCollection;
use JoeCianflone\ModelProperties\Concerns\HasModelProperties;

#[ModelProperties(
    id: ['uuid', 'is:primary', 'auto-increment' => false],
    name: ['string', 'is:fillable'],
    subdomain: ['string', 'is:fillable'],
    tenant_name: ['string',],
    is_active: ['boolean' => true],
)]
#[UseFactory(AccountFactory::class)]
#[CollectedBy(AccountCollection::class)]
class Account extends Model
{
    use HasModelProperties;
    use HasUuids;
}
