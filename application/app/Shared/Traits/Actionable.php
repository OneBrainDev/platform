<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

use Illuminate\Database\Eloquent\Model;

trait Actionable
{
    public function setModel(string $class): void
    {
        $this->modelClass = $class;
    }

    protected function model(?string $class = null): Model
    {
        return $class
          ? app($class)
          : app($this->modelClass);
    }
}
