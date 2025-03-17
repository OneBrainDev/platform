<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasEloquentModel
{
    public function model(): Model
    {
        return app($this->modeling);
    }

}
