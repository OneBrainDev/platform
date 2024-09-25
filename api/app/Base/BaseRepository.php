<?php declare(strict_types=1);

namespace Platform\Base;

use Platform\Contracts\ModelContract;
use Platform\Shared\ValueObjects\UniqueID;

abstract class BaseRepository
{
    public function __construct(
        protected ModelContract $model
    ) {}

    public function delete(UniqueID|ModelContract $target): void
    {
        match ($target instanceof ModelContract) {
            true => $target->delete(),
            false => $this->model->where('id', $target)->delete(),
        };
    }

    public function find() {}
    public function persist() {}
    public function query() {}
}
