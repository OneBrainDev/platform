<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

use Platform\Shared\Contracts\DataObjectContract;

trait RequestToDto
{
    /**
     * @param array<string, mixed>  $extra
     */
    public function toDto(string $class, array $extra = []): DataObjectContract
    {
        return $class::make(array_merge($this->validated(), $extra));
    }
}
