<?php declare(strict_types=1);

namespace Platform\Shared\Abstractions;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Platform\Shared\Contracts\RepositoryContract;
use Platform\Shared\Contracts\ValueObjectContract;

final class Repository implements RepositoryContract
{
    public function __construct(
        private Model $model,
    ) {}

    public function action(string $on, mixed ...$data): void
    {
        $this->handle($on, $data);
    }

    public function all(): Collection
    {
        return $this->model->get();
    }

    public function deleteById(string|Uuid|int $id): void
    {
        $this->model->where('id', $id)->delete();
    }

    public function getById(string|Uuid|int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }

    public function getFirstById(string|Uuid|int $id): Model
    {
        return $this->model->where('id', $id)->firstOrFail();
    }

    public function persist(ValueObjectContract $vo): void
    {
        $this->model->save($vo->toArray());
    }

    public function query(string $on, mixed ...$data): Collection|Model|null
    {
        $values = $this->handle($on, $data);

        if (!$values instanceof Collection && !$values instanceof Model && !is_null($values)) {
            throw new \Exception('Query returning invalid data');
        }

        return $values;
    }

    public function updateById(string|Uuid|int $id, ValueObjectContract $vo): void
    {
        $this->model
            ->where('id', $id)
            ->firstOrFail()
            ->update($vo->toArray());
    }

    private function handle(string $on, mixed ...$data): mixed
    {
        $action = app($on);

        return match($action->hasModel()) {
            true => $action->handle(...$data),
            false => $action->withModel($this->model)->handle(...$data),
            default => throw new \Exception('Unhandled Match in Repository Handler')
        };
    }


}
