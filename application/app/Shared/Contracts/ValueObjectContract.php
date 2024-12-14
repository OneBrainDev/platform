<?php declare(strict_types=1);

namespace Platform\Shared\Contracts;

interface ValueObjectContract
{
    /**
     * @return array<\Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public static function rules(): array;

}
