<?php declare(strict_types=1);

namespace Platform\Shared\Contracts;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryContract
{
    public function action(string $on, mixed ...$data): void;

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection;

    public function deleteById(string|Uuid|int $id): void;

    /**
     * @return Collection<int, Model>
     */
    public function getById(string|Uuid|int $id): Collection;

    public function getFirstById(string|Uuid|int $id): Model;

    public function persist(ValueObjectContract $vo): void;

    /**
     * @return Collection<int, Model>|Model|null
     */
    public function query(string $on, mixed ...$data): Collection|Model|null;

    public function updateById(string|Uuid|int $id, ValueObjectContract $vo): void;


}
