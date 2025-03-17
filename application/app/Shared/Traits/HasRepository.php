<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

use Platform\Shared\Abstractions\Repository;

trait HasRepository
{
    public function repository(): Repository
    {
        return app($this->repo);
    }
}
