<?php declare(strict_types=1);

namespace Platform\Users\Domain\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use JoeCianflone\ModelProperties\ModelProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[ModelProperties(
    id: ['uuid' => 'is:primary|fillable','auto-increment' => false],
    email: ['is:fillable'],
    remember_token: ['is:hidden'],
    email_verified_at: ['datetime'],
    password: ['hash' => 'is:fillable|hidden']
)]
class User extends Authenticatable
{
    /** @use HasFactory<\Platform\Users\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

}
