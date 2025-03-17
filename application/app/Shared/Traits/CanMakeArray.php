<?php declare(strict_types=1);

namespace Platform\Shared\Traits;

use ReflectionClass;
use ReflectionProperty;

trait CanMakeArray
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $reflect = new ReflectionClass($this);
        $props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);

        $arr = [];
        foreach ($props as $prop) {
            $arr[$prop->getName()] = $this->{$prop->getName()};
        }

        return $arr;
    }
}
