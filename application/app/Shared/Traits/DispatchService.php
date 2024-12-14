<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

trait DispatchService
{
    public function defer(): mixed
    {
        return defer(fn () => $this->handle());
    }

    public function dispatch(): mixed
    {
        return dispatch($this);
    }

    public function execute(): mixed
    {
        return $this->handle();
    }
}
