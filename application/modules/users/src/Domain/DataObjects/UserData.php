<?php declare(strict_types=1);

namespace Platform\Users\Domain\DataObjects;

use Bag\Bag;

final readonly class UserData extends Bag
{
    public function __construct(
        public string $id,
        public string $email,
        public string $password,
    ) {}

    /**
     * @return array<\Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public static function rules(): array
    {
        return [
          'email' => 'email|required_without:id',
          'password' => 'string|required_without:id',
        ];
    }
}
