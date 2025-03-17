<?php declare(strict_types=1);

namespace Platform\Shared\Contracts;

interface ServiceContract
{
    public function handle(DataObjectContract $data): mixed;
}
