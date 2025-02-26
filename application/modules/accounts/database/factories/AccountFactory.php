<?php declare(strict_types=1);

namespace Database\Factories;

use Platform\Accounts\Domain\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Platform\Accounts\Domain\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * @var class-string<\Platform\Accounts\Domain\Models\Account>
     */
    protected $model = Account::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'subdomain' => fake()->unique()->domainWord(),
            'tenant_name' => fake()->unique()->word(),
            'is_active' => true,
        ];
    }
}
