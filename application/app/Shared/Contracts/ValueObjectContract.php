<?php declare(strict_types=1);

namespace Platform\Shared\Contracts;

interface ValueObjectContract
{
    /**
     * @return array<int, \Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public static function rules(): array;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
