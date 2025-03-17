<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

trait AlwaysAuthorized
{
    public function authorize(): bool
    {
        return true;
    }

}
